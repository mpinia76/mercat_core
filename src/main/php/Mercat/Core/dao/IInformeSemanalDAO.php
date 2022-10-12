<?php
namespace Mercat\Core\dao;

use Cose\exception\DAOException;

use Cose\Crud\dao\ICrudDAO;

/**
 * Interface del DAO de InformeSemanal
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
interface IInformeSemanalDAO extends ICrudDAO {

	public function getInformeAnualPorSemana($anio);
	
	public function getInformeAnualPorMes($anio);
}
