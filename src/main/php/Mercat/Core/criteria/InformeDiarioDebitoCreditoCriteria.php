<?php
namespace Mercat\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de InformeDiarioDebito
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
class InformeDiarioDebitoCreditoCriteria extends Criteria{

	private $mes;

	private $anio;

	private $estado;
	
	private $fechaVencimiento;
	
	private $fechaVencimientoMenorIgual;
	
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

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getFechaVencimiento()
	{
	    return $this->fechaVencimiento;
	}

	public function setFechaVencimiento($fechaVencimiento)
	{
	    $this->fechaVencimiento = $fechaVencimiento;
	}

	public function getFechaVencimientoMenorIgual()
	{
	    return $this->fechaVencimientoMenorIgual;
	}

	public function setFechaVencimientoMenorIgual($fechaVencimientoMenorIgual)
	{
	    $this->fechaVencimientoMenorIgual = $fechaVencimientoMenorIgual;
	}
}