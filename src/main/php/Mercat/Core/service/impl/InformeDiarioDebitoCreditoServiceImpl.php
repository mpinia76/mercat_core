<?php
namespace Mercat\Core\service\impl;


use Mercat\Core\criteria\InformeDiarioDebitoCreditoCriteria;

use Mercat\Core\utils\MercatUtils;

use Mercat\Core\service\ServiceFactory;

use Mercat\Core\model\InformeDiarioDebitoCredito;
use Mercat\Core\model\Transferencia;

use Mercat\Core\model\EstadoInformeDiarioDebitoCredito;

use Mercat\Core\service\IInformeDiarioDebitoCreditoService;

use Mercat\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

use Cose\persistence\PersistenceContext;

/**
 * servicio para InformeDiarioDebitoCredito
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
class InformeDiarioDebitoCreditoServiceImpl extends CrudService implements IInformeDiarioDebitoCreditoService {

	
	protected function getDAO(){
		return DAOFactory::getInformeDiarioDebitoCreditoDAO();
	}
	
	
	function validateOnAdd( $entity ){
	
		//TODO
		
	}
		
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}

	
	/**
	 * redefino el add
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		$entity->setEstado( EstadoInformeDiarioDebitoCredito::Pendiente );
		
		//agregamos el informe.
		parent::add($entity);
		
		
		//si es un débito y no alcanza el saldo del banco notificamos por email.
		$monto = $entity->getDebito();
		if($monto>0){
		
			$banco = $entity->getBanco();
			
			if( $monto > $banco->getSaldo() ){
				
				$mensaje = "Se ingresó un débito por " . MercatUtils::formatMontoToView($monto) . " a la cuenta " . $banco->__toString()  ; 
				$mensaje .= " para el día : " . MercatUtils::formatDateToView( $entity->getFechaVencimiento() );
				$mensaje .= "<br /> <br />Saldo actual: " . MercatUtils::formatMontoToView( $banco->getSaldo() );
				$mensaje .= "<br /> <br />Faltan: " . MercatUtils::formatMontoToView( $monto - $banco->getSaldo() );
				
				$asunto = "Depositar - Banco: " . $banco->__toString();
			
				MercatUtils::enviarEmail(MercatUtils::MERCAT_NOMBRE_EMAIL_NOTIFICACIONES, MercatUtils::MERCAT_EMAIL_NOTIFICACIONES, $asunto, $mensaje);
			
			}
			
		}
		
	}	
	
	
	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Mercat/Core/service/Mercat\Core\service.IInformeDiarioDebitoCreditoService::acreditar()
	 */
	public function acreditar( InformeDiarioDebitoCredito $informe ){
		
		//chequeamos que pueda acreditarse
		if( !$informe->podesAcreditarte() )
			throw new ServiceException("informe.acreditar.operacion.invalida");
		
		//generamos la transferencia desde Loterías al Banco.	
		$origen = MercatUtils::getCuentaLoterias();
		$destino = $informe->getBanco();
		$monto = $informe->getCredito();
		
		$transferencia = new Transferencia();
		$transferencia->setOrigen( $origen );
		$transferencia->setDestino( $destino );
		$transferencia->setMonto( $monto );
		$transferencia->setFechaHora( new \Datetime() );
		$transferencia->setObservaciones( "" );
		//$transferencia->setUser( $user );
			
		ServiceFactory::getTransferenciaService()->add( $transferencia );
		
		
		//seteamos el informe como acreditado
		$informe->setEstado( EstadoInformeDiarioDebitoCredito::Acreditado );
		$this->update($informe);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Mercat/Core/service/Mercat\Core\service.IInformeDiarioDebitoCreditoService::debitar()
	 */
	public function debitar( InformeDiarioDebitoCredito $informe ){
	
		if( !$informe->podesDebitarte() )
			throw new ServiceException("informe.debitar.operacion.invalida");

		//generamos la transferencia desde el Banco hacia Loterías	
		$origen = $informe->getBanco();
		$destino = MercatUtils::getCuentaLoterias();
		$monto = $informe->getDebito();
		
		//si el saldo no alcanza avisame por email.
		//si el saldo del banco queda en negativo envío un email avisando.
		if($informe->getBanco()->getSaldo() < $monto ){
			
			$mensaje  = "Informe de débito para HOY por " . MercatUtils::formatMontoToView($monto) . " en la cuenta " . $origen->__toString() ;
			$mensaje .=  " <br /> <br />Saldo insuficiente: " . MercatUtils::formatMontoToView( $origen->getSaldo() );
			$mensaje .= "<br /> <br />Faltan: " . MercatUtils::formatMontoToView( $monto - $origen->getSaldo() );
			
			$asunto = "Depositar URGENTE - Banco: " . $origen->__toString();
			MercatUtils::enviarEmail(MercatUtils::MERCAT_NOMBRE_EMAIL_NOTIFICACIONES, MercatUtils::MERCAT_EMAIL_NOTIFICACIONES, $asunto, $mensaje);
			
		}else{
			$transferencia = new Transferencia();
			$transferencia->setOrigen( $origen );
			$transferencia->setDestino( $destino );
			$transferencia->setMonto( $monto );
			$transferencia->setFechaHora( new \Datetime() );
			$transferencia->setObservaciones( "" );
			//$transferencia->setUser( $user );
				
			ServiceFactory::getTransferenciaService()->add( $transferencia );	
			
			
			//seteamos el informe como debitado
			$informe->setEstado( EstadoInformeDiarioDebitoCredito::Debitado );
			$this->update($informe);
		}
		
	}
	
	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Mercat/Core/service/Mercat\Core\service.IInformeDiarioDebitoCreditoService::confirmarPendientes()
	 */
	public function confirmarPendientes(){
		
		//tomo los informes pendientes vencidos o que vencen hoy.
		$criteria = new InformeDiarioDebitoCreditoCriteria();
		$criteria->setEstado(EstadoInformeDiarioDebitoCredito::Pendiente);
		$criteria->setFechaVencimientoMenorIgual( new \DateTime() );
		
		$pendientes = ServiceFactory::getInformeDiarioDebitoCreditoService()->getList( $criteria );
		
		$persistenceContext =  PersistenceContext::getInstance();
		
		if(is_array($pendientes) && count($pendientes)>0)
		foreach ($pendientes as  $informe){
		
			try {
				
				$persistenceContext->beginTransaction();
				
				if( $informe->getCredito() )
					$this->acreditar( $informe );
				else 
					$this->debitar( $informe );	

				$persistenceContext->commit();
					
			} catch (\Exception $e) {
				
				$persistenceContext->rollback();
				
				$mensaje = $e->getMessage();
				$asunto = "Error en proceso de débitos/créditos";
				MercatUtils::enviarEmail(MercatUtils::CTS_NOMBRE_EMAIL_NOTIFICACIONES, MercatUtils::CTS_EMAIL_NOTIFICACIONES, $asunto, $mensaje);
			
				MercatUtils::log( $e->getMessage(), __CLASS__ );
			} catch (Exception $e) {
				
				$persistenceContext->rollback();
				
				$mensaje = $e->getMessage();
				$asunto = "Error en proceso de débitos/créditos";
				MercatUtils::enviarEmail(MercatUtils::CTS_NOMBRE_EMAIL_NOTIFICACIONES, MercatUtils::CTS_EMAIL_NOTIFICACIONES, $asunto, $mensaje);
				
				MercatUtils::log( $e->getMessage(), __CLASS__ );
			}
					
		}
		
	}

	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Mercat/Core/service/Mercat\Core\service.IInformeDiarioDebitoCreditoService::getPendientes()
	 */
	public function getPendientes(){
	
		//tomo los informes pendientes vencidos o que vencen hoy.
		$criteria = new InformeDiarioDebitoCreditoCriteria();
		$criteria->setEstado(EstadoInformeDiarioDebitoCredito::Pendiente);
		$criteria->setFechaVencimientoMenorIgual( new \DateTime() );
	
		$pendientes = ServiceFactory::getInformeDiarioDebitoCreditoService()->getList( $criteria );
		
		return  $pendientes;
	}
}	