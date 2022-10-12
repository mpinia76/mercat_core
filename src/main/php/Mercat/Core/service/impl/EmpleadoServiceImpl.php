<?php
namespace Mercat\Core\service\impl;

use Mercat\Core\criteria\EmpleadoCriteria;

use Mercat\Core\service\IEmpleadoService;

use Mercat\Core\dao\DAOFactory;


use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;
use Cose\Security\model\User;

/**
 * servicio para empleado
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
class EmpleadoServiceImpl extends CrudService implements IEmpleadoService {

	
	protected function getDAO(){
		return DAOFactory::getEmpleadoDAO();
	}
	
	function getEmpleadoByUser(User $user){
	
		try {
			
			$p = $this->getDAO()->getEmpleadoByUser($user);
			return $p;	
			
		} catch (DAOException $e) {

			throw new ServiceException( $e->getMessage() );
			
		} catch (Exception $e) {
				
			throw new ServiceException( $e->getMessage() );
		}
		
		
	}
	
	function validateOnAdd( $entity ){
	
		//que tenga nombre
		$nombre = $entity->getNombre();
		if( empty($nombre) )
			throw new ServiceException("empleado.nombre.required");

		//si tiene tipo + nro documento, que no se repita.
		$tipoDocumento = $entity->getTipoDocumento();
		$documento = $entity->getDocumento();
		if( !empty($documento) ){
			
			if( $this->existsByDocumento($tipoDocumento, $documento, $entity->getOid()) )
				
				throw new DuplicatedEntityException("empleado.documento.unicity");
				
		}else{
			//si no tiene documento, que no exista otro con mismo nombre y sin documento.
			if( $this->existsByNombre($nombre,$tipoDocumento, $documento, $entity->getOid()) )
				
				throw new DuplicatedEntityException("empleado.nombre.unicity");
		}
		
		
	}
	
	/**
	 * Retorna true si existe un cliente dado un tipo y número de documento. 
	 * @param TipoDocumento $tipo
	 * @param string $numero
	 */
	private function existsByDocumento($tipo, $numero, $oid=null){
	
		$criteria = new EmpleadoCriteria();
		$criteria->setDocumento($numero);
		$criteria->setTipoDocumento($tipo);
		$criteria->setOidNotEqual($oid);
		
		$exists = false;
		
		try{
			
			$cliente = $this->getSingleResult( $criteria );
			$exists = true;
			
		}catch (ServiceNonUniqueResultException $ex){
			\Logger::getLogger(__CLASS__)->info( $ex->getMessage());
			$exists = true;
		
		}catch (ServiceException $ex){
			\Logger::getLogger(__CLASS__)->info( $ex->getMessage());
			$exists = false;
		
		}catch (\Exception $ex){
			\Logger::getLogger(__CLASS__)->info("error buscando por documento. " . $ex->getMessage());
			$exists = false;
		}
		return $exists;
	}
	
	/**
	 * Retorna true si existe un cliente dado un nombre pero
	 * que no tenga documento. 
	 * @param string $nombre
	 * @param TipoDocumento $tipo
	 * @param string $numero
	 */
	private function existsByNombre($nombre, $tipoDocumento, $documento, $oid=null){
	
		$criteria = new EmpleadoCriteria();
		$criteria->setNombreEqual($nombre);
		$criteria->setDocumento($documento);
		$criteria->setTipoDocumento($tipoDocumento);
		$criteria->setOidNotEqual($oid);
	
		$exists = false;
		
		try{
			
			$cliente = $this->getSingleResult( $criteria );
			
			\Logger::getLogger(__CLASS__)->info("empleado encontrado por nombre. ");
			
			$exists = true;
			
		}catch (ServiceNonUniqueResultException $ex){
			\Logger::getLogger(__CLASS__)->info( $ex->getMessage());
			$exists = true;
		
		}catch (ServiceException $ex){
			\Logger::getLogger(__CLASS__)->info( $ex->getMessage());
			$exists = false;
		
		}catch (\Exception $ex){
			\Logger::getLogger(__CLASS__)->info("error buscando por nombre. " . $ex->getMessage());
			$exists = false;
		}
		return $exists;
	}
	
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}


}	