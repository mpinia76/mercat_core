<?php
namespace Mercat\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de InformeSemanal
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
class InformeSemanalCriteria extends Criteria{

	private $mes;

	private $anio;
	
	public function getMes()
	{
	    return $this->mes;
	}

	public function setMes($mes)
	{
	    $this->mes = $mes;
	}

	public function getAnio()
	{
	    return $this->anio;
	}

	public function setAnio($anio)
	{
	    $this->anio = $anio;
	}
}