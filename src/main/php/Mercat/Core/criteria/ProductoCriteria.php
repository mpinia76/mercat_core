<?php
namespace Mercat\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de Producto
 *  
 * @author Marcos
 *
 */
class ProductoCriteria extends Criteria{

	private $codigo;
	private $codigoExacto;
	private $fechaDesde;
	private $fechaHasta;
	private $nombre;
	private $tipoProducto;
	private $marcaProducto;
	
	private $nombreOTipoOMarca;
	

	private $vencimientoDesde;
	private $vencimientoHasta;

	private $stockMinimo;
	
	private $porcentajeGanancia2;

	private $fecha;
	
	private $cliente;
	
	private $vendedor;

	public function getFechaDesde()
	{
	    return $this->fechaDesde;
	}

	public function setFechaDesde($fechaDesde)
	{
	    $this->fechaDesde = $fechaDesde;
	}

	public function getFechaHasta()
	{
	    return $this->fechaHasta;
	}

	public function setFechaHasta($fechaHasta)
	{
	    $this->fechaHasta = $fechaHasta;
	}

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getTipoProducto()
	{
	    return $this->tipoProducto;
	}

	public function setTipoProducto($tipoProducto)
	{
	    $this->tipoProducto = $tipoProducto;
	}

	public function getMarcaProducto()
	{
	    return $this->marcaProducto;
	}

	public function setMarcaProducto($marcaProducto)
	{
	    $this->marcaProducto = $marcaProducto;
	}

	public function getNombreOTipoOMarca()
	{
	    return $this->nombreOTipoOMarca;
	}

	public function setNombreOTipoOMarca($nombreOTipoOMarca)
	{
	    $this->nombreOTipoOMarca = $nombreOTipoOMarca;
	}

	public function getVencimientoDesde()
	{
	    return $this->vencimientoDesde;
	}

	public function setVencimientoDesde($vencimientoDesde)
	{
	    $this->vencimientoDesde = $vencimientoDesde;
	}

	public function getVencimientoHasta()
	{
	    return $this->vencimientoHasta;
	}

	public function setVencimientoHasta($vencimientoHasta)
	{
	    $this->vencimientoHasta = $vencimientoHasta;
	}

	public function getCodigo()
	{
	    return $this->codigo;
	}

	public function setCodigo($codigo)
	{
	    $this->codigo = $codigo;
	}

	public function getStockMinimo()
	{
	    return $this->stockMinimo;
	}

	public function setStockMinimo($stockMinimo)
	{
	    $this->stockMinimo = $stockMinimo;
	}

	public function getCodigoExacto()
	{
	    return $this->codigoExacto;
	}

	public function setCodigoExacto($codigoExacto)
	{
	    $this->codigoExacto = $codigoExacto;
	}

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}
	
	public function getCliente()
	{
	    return $this->cliente;
	}

	public function setCliente($cliente)
	{
	    $this->cliente = $cliente;
	}

	public function getVendedor()
	{
	    return $this->vendedor;
	}

	public function setVendedor($vendedor)
	{
	    $this->vendedor = $vendedor;
	}

	public function getPorcentajeGanancia2()
	{
	    return $this->porcentajeGanancia2;
	}

	public function setPorcentajeGanancia2($porcentajeGanancia2)
	{
	    $this->porcentajeGanancia2 = $porcentajeGanancia2;
	}
}