<?php
namespace Mercat\Core\service\impl;


use Mercat\Core\criteria\CajaChicaCriteria;

use Mercat\Core\service\ICajaChicaService;

use Mercat\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para cajachica
 *  
 * @author Bernardo
 * @since 04-06-2014
 *
 */
class CajaChicaServiceImpl extends CrudService implements ICajaChicaService {

	
	protected function getDAO(){
		return DAOFactory::getCajaChicaDAO();
	}
	
	function add( $entity ){
		
		$entity->setSaldo( $entity->getSaldoInicial() );
		
		parent::add( $entity );

	}
	
	function validateOnAdd( $entity ){
	
		//TODO que tenga cliente?
			
		//TODO unicidad (cliente )
		
	}
		
	
	function validateOnUpdate( $entity ){
	
		$this->validateOnAdd($entity);
	}
	
	function validateOnDelete( $oid ){}

	
}	