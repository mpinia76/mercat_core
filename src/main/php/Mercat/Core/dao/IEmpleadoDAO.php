<?php
namespace Mercat\Core\dao;

use Cose\exception\DAOException;

use Cose\Crud\dao\ICrudDAO;
use Cose\Security\model\User;

/**
 * Interface del DAO de Empleado
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
interface IEmpleadoDAO extends ICrudDAO {
	
	function getEmpleadoByUser(User $user);
	
}
