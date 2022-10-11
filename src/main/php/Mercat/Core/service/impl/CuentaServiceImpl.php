<?php
namespace Mercat\Core\service\impl;


use Mercat\Core\model\MovimientoCuenta;

use Mercat\Core\model\Cuenta;

use Mercat\Core\criteria\CuentaCriteria;

use Mercat\Core\model\Empleado;

use Mercat\Core\service\ICuentaService;

use Mercat\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para cuenta
 *  
 * @author Marcos
 * @since 09-03-2018
 *
 */
class CuentaServiceImpl extends CrudService implements ICuentaService {

	
	protected function getDAO(){
		return DAOFactory::getCuentaDAO();
	}
	
	function validateOnAdd( $entity ){
	
		//unicidad (numero + fecha + horaApertura )
		
	}
		
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}


	
	
}	