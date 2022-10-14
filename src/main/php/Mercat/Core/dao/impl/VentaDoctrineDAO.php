<?php
namespace Mercat\Core\dao\impl;

use Mercat\Core\utils\MercatUtils;

use Doctrine\ORM\Query\Expr\Andx;

use Mercat\Core\dao\IVentaDAO;

use Mercat\Core\model\Venta;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;
/**
 * dao para Venta
 *
 * @author Marcos
 * @since 12-03-2018
 *
 */
class VentaDoctrineDAO extends CrudDAO implements IVentaDAO{

	protected function getClazz(){
		return get_class( new Venta() );
	}

	protected function getQueryBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select(array('v', 'c', 've', 'u'))
	   				->from( $this->getClazz(), "v")
					->leftJoin('v.vendedor', 've')
                    ->leftJoin('v.user', 'u')
					->leftJoin('v.cliente', 'c');

		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select('count(v.oid)')
	   				->from( $this->getClazz(), "v")
                    ->leftJoin('v.user', 'u')
					->leftJoin('v.vendedor', 've')
					->leftJoin('v.cliente', 'c');

		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){

		$fecha = $criteria->getFecha();
		if( !empty($fecha) ){
			$fecha->setTime(0,0,0);
			$queryBuilder->andWhere( "v.fecha >= '" . $fecha->format("Y-m-d") . "'");
			$fecha->modify("+1 day");
			$queryBuilder->andWhere( "v.fecha < '" . $fecha->format("Y-m-d") . "'");
		}

		$fechaDesde = $criteria->getFechaDesde();
		if( !empty($fechaDesde) ){
			$queryBuilder->andWhere( "v.fecha >= '" . $fechaDesde->format("Y-m-d") . "'");
		}

		$fechaHasta = $criteria->getFechaHasta();
		if( !empty($fechaHasta) ){
			$queryBuilder->andWhere( "v.fecha <= '" . $fechaHasta->format("Y-m-d") . "'");
		}





		$cliente = $criteria->getCliente();
		if( !empty($cliente) && $cliente!=null){
			if (is_object($cliente)) {
				$clienteOid = $cliente->getOid();
				if(!empty($clienteOid))
					$queryBuilder->andWhere( "c.oid= $clienteOid" );
			}
			else $queryBuilder->andWhere( "c.nombre like '%$cliente%'");

		}

        $user = $criteria->getUser();
        if( !empty($user) && $user!=null){
            if (is_object($user)) {
                $userOid = $user->getOid();
                if(!empty($userOid))
                    $queryBuilder->andWhere( "u.oid= $userOid" );
            }
            else $queryBuilder->andWhere( "u.username like '%$user%'");

        }

		$vendedor = $criteria->getVendedor();
		if( !empty($vendedor) && $vendedor!=null){
			if (is_object($vendedor)) {
				$vendedorOid = $vendedor->getOid();
				if(!empty($vendedorOid))
					$queryBuilder->andWhere( "ve.oid= $vendedorOid" );
			}
			else $queryBuilder->andWhere( "ve.nombre like '%$vendedor%'");

		}

		$estadoNot = $criteria->getEstadoNotEqual();
		if( !empty($estadoNot) ){
			$queryBuilder->andWhere( "v.estado != " . $estadoNot );
		}

		$estado = $criteria->getEstado();
		if( !empty($estado) ){
			$queryBuilder->andWhere( "v.estado = " . $estado );
		}

		$estados = $criteria->getEstados();
		if( !empty($estados) && count( $estados>0) ){

			$strEstados = implode(",", $estados );

			$queryBuilder->andWhere( $queryBuilder->expr()->in("v.estado", $strEstados) );
		}

		$observaciones = $criteria->getObservaciones();
		if( !empty($observaciones) ){
			$queryBuilder->andWhere("upper(v.observaciones)  like :observaciones");
			$queryBuilder->setParameter( "observaciones" , "%$observaciones%" );
		}
		$mes = $criteria->getMes();
		if( !empty($mes) ){
			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');

			$queryBuilder->andWhere( "MONTH(v.fecha) =" . $mes->format("m"));
			$queryBuilder->andWhere( "YEAR(v.fecha) =" . $mes->format("Y"));
		}

		$year = $criteria->getYear();
		if( !empty($year) ){

			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');

			$queryBuilder->andWhere( "YEAR(v.fecha) =" . $year->format("Y"));
		}


	}

	protected function getFieldName($name){

		$hash = array();

		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "v.$name";
		}

	}

	public function getTotalesDia(\Datetime $fecha){

		try {
			$ventaClass = get_class( new Venta() );

			$emConfig = $this->getEntityManager()->getConfiguration();
			$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');
    		$emConfig->addCustomDatetimeFunction('DAY', 'DoctrineExtensions\Query\Mysql\Day');

			$q = $this->getEntityManager()->createQuery(
				"SELECT
					COUNT(v.oid) as cantidad, SUM(v.monto) as monto
					FROM $ventaClass v
					WHERE MONTH(v.fecha) = " . $fecha->format("m") . " AND
					YEAR(v.fecha) = " . $fecha->format("Y")  . " AND
					DAY(v.fecha) = " . $fecha->format("d")
			);

			$r = $q->getScalarResult();

			return $r;

		} catch (\Doctrine\ORM\Query\QueryException $e) {

			throw new DAOException( $e->getMessage() );

		} catch (\Exception $e) {

			throw new DAOException( $e->getMessage() );

		}
	}

	public function getTotalesMes(\Datetime $fecha){

		try {

			$ventaClass = get_class( new Venta() );

			$emConfig = $this->getEntityManager()->getConfiguration();
    		$emConfig->addCustomDatetimeFunction('YEAR', 'DoctrineExtensions\Query\Mysql\Year');
    		$emConfig->addCustomDatetimeFunction('MONTH', 'DoctrineExtensions\Query\Mysql\Month');

			$q = $this->getEntityManager()->createQuery(
				"SELECT
					COUNT(v.oid) as cantidad, SUM(v.monto) as monto
					FROM $ventaClass v
					WHERE MONTH(v.fecha) = " . $fecha->format("m") . " AND
					YEAR(v.fecha) = " . $fecha->format("Y")
			);

			$r = $q->getScalarResult();

			return $r;

		} catch (\Doctrine\ORM\Query\QueryException $e) {

			throw new DAOException( $e->getMessage() );

		} catch (\Exception $e) {

			throw new DAOException( $e->getMessage() );

		}
	}

    public function getRankProductos(ICriteria $criteria, $productos){

        try {




            $RAW_QUERY="SELECT P1.nombre producto,mercat_marca_producto.nombre marca,mercat_tipo_producto.nombre tipo, sum(todo.cantidad) AS canttotal FROM
(SELECT mercat_producto.oid, SUM(mercat_detalle_venta.cantidad) AS cantidad
FROM mercat_venta
INNER JOIN mercat_detalle_venta ON mercat_venta.oid = mercat_detalle_venta.venta_oid

INNER JOIN mercat_producto ON mercat_producto.oid = mercat_detalle_venta.producto_oid
WHERE mercat_venta.estado != 4";
            if($productos){
                $RAW_QUERY.=" AND mercat_producto.oid in (".implode(",",$productos).")";
            }

            $vendedor = $criteria->getVendedor();
            if( !empty($vendedor) && $vendedor!=null){
                if (is_object($vendedor)) {
                    $vendedorOid = $vendedor->getOid();
                    if(!empty($vendedorOid))
                        $RAW_QUERY.=" AND mercat_venta.vendedor_oid = :vendedor_id";
                }


            }
            $fechaDesde = $criteria->getFechaDesde();
            if( !empty($fechaDesde) ){
                $RAW_QUERY.=" AND mercat_venta.fecha >= '" . $fechaDesde->format("Y-m-d") . "'";
            }

            $fechaHasta = $criteria->getFechaHasta();
            if( !empty($fechaHasta) ){
                $RAW_QUERY.=" AND mercat_venta.fecha <= '" . $fechaHasta->format("Y-m-d") . "'";
            }


            $RAW_QUERY.=" GROUP BY mercat_producto.oid

UNION ALL

SELECT mercat_producto.oid, (-1)*sum(mercat_devolucion_venta.cantidad) AS cantidad
FROM mercat_venta
INNER JOIN mercat_devolucion_venta ON mercat_venta.oid = mercat_devolucion_venta.venta_oid

INNER JOIN mercat_producto ON mercat_producto.oid = mercat_devolucion_venta.producto_oid
WHERE mercat_venta.estado != 4";
            if($productos){
                $RAW_QUERY.=" AND mercat_producto.oid in (".implode(",",$productos).")";
            }
            $vendedor = $criteria->getVendedor();
            if( !empty($vendedor) && $vendedor!=null){
                if (is_object($vendedor)) {
                    $vendedorOid = $vendedor->getOid();
                    if(!empty($vendedorOid))
                        $RAW_QUERY.=" AND mercat_venta.vendedor_oid = :vendedor_id";
                }


            }

            $fechaDesde = $criteria->getFechaDesde();
            if( !empty($fechaDesde) ){
                $RAW_QUERY.=" AND mercat_venta.fecha >= '" . $fechaDesde->format("Y-m-d") . "'";
            }

            $fechaHasta = $criteria->getFechaHasta();
            if( !empty($fechaHasta) ){
                $RAW_QUERY.=" AND mercat_venta.fecha <= '" . $fechaHasta->format("Y-m-d") . "'";
            }

            $RAW_QUERY.=" GROUP BY mercat_producto.oid) todo INNER JOIN mercat_producto AS P1 ON todo.oid = P1.oid
INNER JOIN mercat_marca_producto  ON mercat_marca_producto.oid = P1.marcaProducto_oid
INNER JOIN mercat_tipo_producto  ON mercat_tipo_producto.oid = P1.tipoProducto_oid
GROUP BY todo.oid
ORDER BY canttotal DESC";

             //echo    $RAW_QUERY;
            $statement = $this->getEntityManager()->getConnection()->prepare($RAW_QUERY);

            $vendedor = $criteria->getVendedor();
            if( !empty($vendedor) && $vendedor!=null){
                if (is_object($vendedor)) {
                    $vendedorOid = $vendedor->getOid();
                    if(!empty($vendedorOid))
                        $statement->bindValue('vendedor_id', $vendedorOid);
                }


            }


            $statement->execute();

            $result = $statement->fetchAll();



            return $result;

        } catch (\Doctrine\ORM\Query\QueryException $e) {

            throw new DAOException( $e->getMessage() );

        } catch (\Exception $e) {

            throw new DAOException( $e->getMessage() );

        }
    }

    public function getRankClientes(ICriteria $criteria){

        try {




            $RAW_QUERY="SELECT mercat_cliente.oid, mercat_persona.nombre, sum(mercat_venta.montoPagado) AS saldo
FROM mercat_venta
INNER JOIN mercat_cliente ON mercat_venta.cliente_oid = mercat_cliente.oid
INNER JOIN mercat_persona ON mercat_persona.oid = mercat_cliente.oid

WHERE mercat_cliente.oid != 1 AND mercat_venta.estado != 4";



            /*$vendedor = $criteria->getVendedor();
            if( !empty($vendedor) && $vendedor!=null){
                if (is_object($vendedor)) {
                    $vendedorOid = $vendedor->getOid();
                    if(!empty($vendedorOid))
                        $RAW_QUERY.=" AND mercat_venta.vendedor_oid = :vendedor_id";
                }


            }*/
            $fechaDesde = $criteria->getFechaDesde();
            if( !empty($fechaDesde) ){
                $RAW_QUERY.=" AND mercat_venta.fecha >= '" . $fechaDesde->format("Y-m-d") . "'";
            }

            $fechaHasta = $criteria->getFechaHasta();
            if( !empty($fechaHasta) ){
                $RAW_QUERY.=" AND mercat_venta.fecha <= '" . $fechaHasta->format("Y-m-d") . "'";
            }


            $RAW_QUERY.=" GROUP BY mercat_cliente.oid
                            ORDER BY saldo DESC";




            //echo    $RAW_QUERY;
            $statement = $this->getEntityManager()->getConnection()->prepare($RAW_QUERY);

            $vendedor = $criteria->getVendedor();
            if( !empty($vendedor) && $vendedor!=null){
                if (is_object($vendedor)) {
                    $vendedorOid = $vendedor->getOid();
                    if(!empty($vendedorOid))
                        $statement->bindValue('vendedor_id', $vendedorOid);
                }


            }


            $statement->execute();

            $result = $statement->fetchAll();



            return $result;

        } catch (\Doctrine\ORM\Query\QueryException $e) {

            throw new DAOException( $e->getMessage() );

        } catch (\Exception $e) {

            throw new DAOException( $e->getMessage() );

        }
    }

}
