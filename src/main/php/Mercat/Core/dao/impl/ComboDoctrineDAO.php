<?php
namespace Mercat\Core\dao\impl;

use Mercat\Core\utils\MercatUtils;

use Doctrine\ORM\Query\Expr\Andx;

use Mercat\Core\dao\IComboDAO;

use Mercat\Core\model\Combo;

use Mercat\Core\model\ProductoCombo;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;
/**
 * dao para Combo
 *  
 * @author Marcos
 * @since 28-08-2018
 * 
 */
class ComboDoctrineDAO extends CrudDAO implements IComboDAO{
	
	protected function getClazz(){
		return get_class( new Combo() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('c'))
	   				->from( $this->getClazz(), "c");
		
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(c.oid)')
	   				->from( $this->getClazz(), "c");
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		$nombre = $criteria->getNombre();
		if( !empty($nombre) ){
			$queryBuilder->andWhere("upper(c.nombre)  like :nombre");
			$queryBuilder->setParameter( "nombre" , "%$nombre%" );
		}
		
	}	
	
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "c.$name";	
		}	
		
	}	
	
	function vaciarProductos($oid){
		$productoComboClass = get_class( new ProductoCombo() );
		$q = $this->getEntityManager()->createQuery("DELETE FROM $productoComboClass DC WHERE DC.combo = " .$oid );
		$q->execute();
	}
	
	
}