<?php
namespace Mercat\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de detalle
 *  
 * @author Marcos
 * @since 15-08-2020
 *
 */
class DetalleVentaCriteria extends Criteria{

	
	
	
	
	private $ventas;
	
	private $productos;
	
	
	
	

	

	public function getProductos()
	{
	    return $this->productos;
	}

	public function setProductos($productos)
	{
	    $this->productos = $productos;
	}

	public function getVentas()
	{
	    return $this->ventas;
	}

	public function setVentas($ventas)
	{
	    $this->ventas = $ventas;
	}
}