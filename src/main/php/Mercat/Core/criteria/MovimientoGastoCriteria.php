<?php
namespace Mercat\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de MovimientoGasto
 *  
 * @author Marcos
 * @since 09-03-2018
 *
 */
class MovimientoGastoCriteria extends MovimientoCajaCriteria{

	private $gasto;

	

	public function getGasto()
	{
	    return $this->gasto;
	}

	public function setGasto($gasto)
	{
	    $this->gasto = $gasto;
	}
}