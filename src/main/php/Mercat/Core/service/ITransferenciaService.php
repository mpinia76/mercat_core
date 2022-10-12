<?php
namespace Mercat\Core\service;


use Mercat\Core\model\Transferencia;

use Cose\Crud\service\ICrudService;

use Cose\Security\model\User;

/**
 * interfaz para el servicio de Transferencia
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
interface ITransferenciaService extends ICrudService {
	
	/**
	 * se anula la transferencia
	 * @param Transferencia $transferencia
	 * @param User $user
	 */
	public function anular(Transferencia $transferencia, User $user);

}