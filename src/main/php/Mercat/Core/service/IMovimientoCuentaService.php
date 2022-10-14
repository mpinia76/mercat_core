<?php
namespace Mercat\Core\service;


use Mercat\Core\model\Cuenta;

use Mercat\Core\model\MovimientoCuenta;

use Cose\Crud\service\ICrudService;

/**
 * interfaz para el servicio de MovimientoCuenta
 *  
 * @author Marcos
 * @since 13-10-2022
 *
 */
interface IMovimientoCuentaService extends ICrudService {
	
	
	function getMovimientos( Cuenta $cuenta, \Datetime $fecha = null);
	
	function getTotales( Cuenta $cuenta, \Datetime $fecha = null);
	
	function getTotalesMes( Cuenta $cuenta, \Datetime $fecha = null);
	
	function getTotalesAnioPorMes( Cuenta $cuenta, $anio);
	
}