<?php
namespace Mercat\Core\dao\impl;

use Mercat\Core\dao\IMovimientoTransferenciaDAO;

use Mercat\Core\model\MovimientoTransferencia;

use Mercat\Core\model\ConceptoMovimiento;

use Mercat\Core\dao\IConceptoMovimientoDAO;

use Mercat\Core\criteria\ConceptoMovimientoCriteria;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

use Mercat\Core\model\Cuenta;
use Doctrine\ORM\Query\Expr\Andx;

/**
 * dao para MovimientoTransferencia
 *  
 * @author Marcos
 * @since 12-10-2022
 * 
 */
class MovimientoTransferenciaDoctrineDAO extends CrudDAO implements IMovimientoTransferenciaDAO{
	
	protected function getClazz(){
		return get_class( new MovimientoTransferencia() );
	}
	
	protected function getQueryBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select(array('mp', 'p', 'c'))
	   				->from( $this->getClazz(), "mp")
					->leftJoin('mp.cuenta', 'c')
					->leftJoin('mp.transferencia', 'p');
		
		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){
		
		$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
		$queryBuilder->select('count(mp.oid)')
	   				->from( $this->getClazz(), "mp")
					->leftJoin('mp.cuenta', 'c')
					->leftJoin('mp.transferencia', 'p');
								
		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){
	
//		$oid = $criteria->getOidNotEqual();
//		if( !empty($oid) ){
//			$queryBuilder->andWhere( "mp.oid <> $oid");
//		}
		
		//TODO filtrar por cuenta y fecha.
		
		$transferencia = $criteria->getTransferencia();
		if( !empty($transferencia) && $transferencia!=null){
			$transferenciaOid = $transferencia->getOid();
			if(!empty($transferenciaOid))
				$queryBuilder->andWhere( "p.oid= $transferenciaOid" );
		}
		
		
	}	
	
	protected function getFieldName($name){
		
		$hash = array();
		
		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "mp.$name";	
		}	
		
	}

	public function getTotales(Cuenta $cuenta=null, \Datetime $fecha = null){
	
		try {
			
			$movimientoClass = get_class( new MovimientoTransferencia() );
			
			
			
			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    		$emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

			$queryBuilder = $this->getEntityManager()->createQueryBuilder();
		
			$queryBuilder->select('SUM(mc.debe) as debe, SUM(mc.haber) as haber')
	   				->from( $movimientoClass, "mc")
					->leftJoin('mc.cuenta', 'c');
					
			if( $cuenta != null )		
				$queryBuilder->andWhere( "c.oid=" .  $cuenta->getOid() );
			
			if($fecha != null ){
				$queryBuilder->andWhere( "MONTH(mc.fecha) = " . $fecha->format("m") );
				$queryBuilder->andWhere( "YEAR(mc.fecha) = " . $fecha->format("Y") );
				$queryBuilder->andWhere( "DAY(mc.fecha) = " . $fecha->format("d") );
			}
			
			
			$q = $queryBuilder->getQuery();
			
			$r = $q->getScalarResult();
		
			return $r;
			
		} catch (\Doctrine\ORM\Query\QueryException $e) {
			
			throw new DAOException( $e->getMessage() );
			
		} catch (\Exception $e) {
			
			throw new DAOException( $e->getMessage() );
			
		}
	}
}