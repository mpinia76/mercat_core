<?php
namespace Mercat\Core\service;


use Mercat\Core\model\MovimientoCuenta;

use Mercat\Core\model\Empleado;
use Mercat\Core\model\Caja;

use Cose\Crud\service\ICrudService;
use Cose\Security\model\User;

/**
 * interfaz para el servicio de caja
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
interface ICajaService extends ICrudService {
	
	function getCajasAbiertas( \Datetime $fecha = null );
	
	function getCajasFecha( \Datetime $fecha );
	
	function getCajaAbiertaByEmpleado(Empleado $empleado);
	
	function cerrarCaja(Caja $caja, User $user);
	
	function abrirCaja( Caja $caja, User $user );

}