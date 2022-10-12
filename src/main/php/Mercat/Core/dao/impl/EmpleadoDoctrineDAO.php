<?php
namespace Mercat\Core\dao\impl;

use Mercat\Core\dao\IEmpleadoDAO;

use Mercat\Core\model\Empleado;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;
use Cose\Security\model\User;

/**
 * dao para Empleado
 *  
 * @author Marcos
 * @since 12-10-2022
 * 
 */
class EmpleadoDoctrineDAO extends CrudDAO implements IEmpleadoDAO{
	
	protected function getClazz(){
		return get_class( new Empleado() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('e'))
	   				->from( $this->getClazz(), "e");
		
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(e.oid)')
	   				->from( $this->getClazz(), "e");
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
		$oid = $criteria->getOidNotEqual();
		if( !empty($oid) ){
			$queryBuilder->andWhere( "e.oid <> $oid");
		}
		
		$nombre = $criteria->getNombre();
		if( !empty($nombre) ){
			$queryBuilder->andWhere( "e.nombre like '%$nombre%'");
		}
		

		
		
		$nombreEq = $criteria->getNombreEqual();
		if( !empty($nombreEq) ){
			$queryBuilder->andWhere("e.nombre = '$nombreEq'");
		}
		

		$documento = $criteria->getDocumento();
		if( !empty($documento) ){
			$queryBuilder->andWhere("e.documento = '$documento'");
		}

		$tipoDocumento = $criteria->getTipoDocumento();
		if( !empty($tipoDocumento) ){
			$queryBuilder->andWhere("e.tipoDocumento = '$tipoDocumento'");
		}				
	}	
	
	public function getEmpleadoByUser(User $user){
	
		try {
			$qb = $this->getEntityManager()->createQueryBuilder();
			
			$qb->select(array('e', 'u'))
	   				->from( $this->getClazz(), "e")
					->leftJoin('e.user', 'u');
	   
			$qb->where( "u.oid= '" . $user->getOid() . "'");
			
			$q = $qb->getQuery();
			
			return $q->getSingleResult();
				
		} catch(\Doctrine\ORM\NoResultException $e){
			throw new DAOException( $e->getMessage() );
			
		} catch (Exception $e) {
			throw new DAOException( $e->getMessage() );
		}
	
		
	}
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "e.$name";	
		}	
		
	}	
}