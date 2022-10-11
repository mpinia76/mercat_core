<?php
namespace Mercat\Core\service\impl;


use Mercat\Core\service\ServiceFactory;

use Mercat\Core\utils\MercatUtils;

use Mercat\Core\model\DetalleVenta;



use Mercat\Core\service\IDetalleVentaService;

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
 * servicio para DetalleVenta
 *  
 * @author Marcos
 * @since 15-08-2020
 *
 */
class DetalleVentaServiceImpl extends CrudService implements IDetalleVentaService {

	
	protected function getDAO(){
		return DAOFactory::getDetalleVentaDAO();
	}
	
	
	function validateOnAdd( $entity ){
	
		//TODO		
	}
		
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}


	
	
}	