<?php

namespace Mercat\Core\model;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * Venta
 * 
 * @Entity @Table(name="mercat_venta")
 * 
 * @author Marcos
 * @since 12-03-2018
 */

class Venta extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="datetime")
	 * @var \Datetime
	 */
	private $fecha;
	
	/**
     * @ManyToOne(targetEntity="Cliente",cascade={"merge"})
     * @JoinColumn(name="cliente_oid", referencedColumnName="oid")
     * @var Cliente
     **/
	private $cliente;
	
	
	
	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $monto;
	
	/**
	 * @Column(type="float", nullable=true)
	 * @var float
	 */
	private $montoPagado;

	
	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $montoDebe;
	
	/**
	 * @Column(type="float", nullable=true)
	 * @var float
	 */
	private $ganancia;
	
	/**
	 * @Column(type="float", nullable=true)
	 * @var float
	 */
	private $montoDevolucion;
	
	/**
	 * @Column(type="float", nullable=true)
	 * @var float
	 */
	private $montoActualizado;
	
	/**
	 * @Column(type="integer")
	 * @var EstadoVenta
	 */
	private $estado;
	
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $observaciones;
	
	/**
     * @ManyToOne(targetEntity="Vendedor",cascade={"merge"})
     * @JoinColumn(name="vendedor_oid", referencedColumnName="oid")
     * @var Vendedor
     **/
	private $vendedor;
	
	/**
	 * @Column(type="float", nullable=true)
	 * 
	 */
	private $comision;
	
	
	/**
     * @ManyToOne(targetEntity="Cose\Security\model\User",cascade={"merge"})
     * @JoinColumn(name="user_oid", referencedColumnName="oid")
     * 
     * usuario q generó la operación
     **/
    private $user;
    
    
    /**
     * @OneToMany(targetEntity="DetalleVenta", mappedBy="venta", cascade={"persist"})
     **/
    private $detalles;
    
    /**
     * @OneToMany(targetEntity="DevolucionVenta", mappedBy="venta", cascade={"persist"})
     **/
    private $devoluciones;
    
    
    
	public function __construct(){
		$this->detalles = array();
		$this->devoluciones = array();
		//$this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	public function __toString(){
		 return "";
	}


	

	public function getCliente()
	{
	    return $this->cliente;
	}

	public function setCliente($cliente)
	{
	    $this->cliente = $cliente;
	}

	

	public function getMonto()
	{
	    return $this->monto;
	}

	public function setMonto($monto)
	{
	    $this->monto = $monto;
	}

	public function getMontoDebe()
	{
	    return $this->montoDebe;
	}

	public function setMontoDebe($montoDebe)
	{
	    $this->montoDebe = $montoDebe;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}

	

	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}
	
	public function addDetalle( DetalleVenta $detalle ){
		
		$detalle->setVenta( $this );
		$this->detalles[] = $detalle;
		
	}
	
	public function addDevolucion( DevolucionVenta $devolucion ){
		
		$devolucion->setVenta( $this );
		$this->devoluciones[] = $devolucion;
		
	}

	public function getDetalles()
	{
	    return $this->detalles;
	}

	public function setDetalles($detalles)
	{
	    $this->detalles = $detalles;
	}
	
	public function getDevoluciones()
	{
	    return $this->devoluciones;
	}

	public function setDevoluciones($devoluciones)
	{
	    $this->devoluciones = $devoluciones;
	}
	
	public  function podesAnularte(){
		
		return $this->getEstado() != EstadoVenta::Anulada;
		
	}
	
	public  function podesCobrarte(){
		
		return ($this->getEstado() != EstadoVenta::Anulada) && ($this->getEstado() != EstadoVenta::Pagada);
		
	}

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}

	public function getMontoPagado()
	{
	    return $this->montoPagado;
	}

	public function setMontoPagado($montoPagado)
	{
	    $this->montoPagado = $montoPagado;
	}
	
	public function getGanancia()
	{
	    return $this->ganancia;
	}

	public function setGanancia($ganancia)
	{
	    $this->ganancia = $ganancia;
	}
	
	public function getMontoDevolucion()
	{
	    return $this->montoDevolucion;
	}

	public function setMontoDevolucion($montoDevolucion)
	{
	    $this->montoDevolucion = $montoDevolucion;
	}
	
	public function getMontoActualizado()
	{
	    return $this->montoActualizado;
	}

	public function setMontoActualizado($montoActualizado)
	{
	    $this->montoActualizado = $montoActualizado;
	}

	public function getVendedor()
	{
	    return $this->vendedor;
	}

	public function setVendedor($vendedor)
	{
	    $this->vendedor = $vendedor;
	}

	public function getComision()
	{
	    return $this->comision;
	}

	public function setComision($comision)
	{
	    $this->comision = $comision;
	}
}
?>