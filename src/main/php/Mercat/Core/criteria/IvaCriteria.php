<?php
namespace Mercat\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de Iva
 *  
 * @author Marcos
 *
 */
class IvaCriteria extends Criteria{

	private $nombre;
	
	
	

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	
}