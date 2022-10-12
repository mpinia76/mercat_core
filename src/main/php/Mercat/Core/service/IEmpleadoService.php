<?php
namespace Mercat\Core\service;


use Cose\Crud\service\ICrudService;

use Cose\Security\model\User;

/**
 * interfaz para el servicio de Empleado
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
interface IEmpleadoService extends ICrudService {
	
	function getEmpleadoByUser(User $user);
	
	
}