<?php
namespace Mercat\Core\service\impl;


use Mercat\Core\utils\MercatUtils;



use Mercat\Core\model\Sucursal;

use Mercat\Core\model\EstadoPago;
use Cose\Security\model\User;

use Mercat\Core\model\Pago;



use Mercat\Core\model\Cuenta;

use Mercat\Core\model\Cliente;

use Mercat\Core\service\ServiceFactory;



use Mercat\Core\criteria\TarjetaCriteria;

use Mercat\Core\service\ITarjetaService;

use Mercat\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para tarjeta
 *  
 * @author Marcos
 * @since 27-03-2018
 *
 */
class TarjetaServiceImpl extends CrudService implements ITarjetaService {

	
	protected function getDAO(){
		return DAOFactory::getTarjetaDAO();
	}
	
	function add( $entity ){
		
		$entity->setSaldo( $entity->getSaldoInicial() );
		
		//$entity->getCliente()->setTarjeta( $entity );
		
		parent::add( $entity );

//		//le asignamos la cuenta al cliente.
//		$cliente = DAOFactory::getClienteDAO()->get( $entity->getCliente()->getOid() );
//		$cliente->setTarjeta( $entity );
//		DAOFactory::getClienteDAO()->update( $cliente );
		
	}
	
	function validateOnAdd( $entity ){
	
		//TODO que tenga cliente?
			
		//TODO unicidad (cliente )
		
	}
		
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}

	
	
	
	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Mercat/Core/service/Mercat\Core\service.ITarjetaService::getTotalesVenta()
	 */
	public function getTotalesVenta( \DateTime $fecha ){
	
		$totales=0;
		
		//obtenemos todas las tarjetas corrientes
		$criteria = new TarjetaCriteria();
		$tarjetas = $this->getList( $criteria );
		foreach ($tarjetas as $tarjeta) {
			$totales += ServiceFactory::getMovimientoVentaService()->getTotales( $tarjeta, $fecha );
		}
			
		return $totales;
	
	}
	
	
	
		
	
	
}	