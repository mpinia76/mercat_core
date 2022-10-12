<?php

namespace Mercat\Core\model;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * InformeSemanal
 * 
 * Informe Semanal de la máquina de loterías
 * 
 * 
 * @Entity @Table(name="mercat_informe_semanal")
 * 
 * @author Marcos
 * @since 12-10-2022
 */

class InformeSemanal extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="date")
	 * @var \Datetime
	 */
	private $fechaDesde;
	
	/**
	 * @Column(type="date")
	 * @var \Datetime
	 */
	private $fechaHasta;
	
	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $ventas;

	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $cancelaciones;
		
	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $pagos;
	

	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $ajustes;
	
	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $deuda;
	

	
	/**
     * @ManyToOne(targetEntity="Cose\Security\model\User",cascade={"detach"})
     * @JoinColumn(name="user_oid", referencedColumnName="oid")
     * 
     * usuario q generó la operación
     **/
    private $user;
    
	
	public function __construct(){
	}
	
	public function __toString(){
		 return "";
	}

    /**
     * @return \Datetime
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * @param \Datetime $fechaDesde
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;
    }

    /**
     * @return \Datetime
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * @param \Datetime $fechaHasta
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;
    }

    /**
     * @return float
     */
    public function getVentas()
    {
        return $this->ventas;
    }

    /**
     * @param float $ventas
     */
    public function setVentas($ventas)
    {
        $this->ventas = $ventas;
    }

    /**
     * @return float
     */
    public function getCancelaciones()
    {
        return $this->cancelaciones;
    }

    /**
     * @param float $cancelaciones
     */
    public function setCancelaciones($cancelaciones)
    {
        $this->cancelaciones = $cancelaciones;
    }

    /**
     * @return float
     */
    public function getPagos()
    {
        return $this->pagos;
    }

    /**
     * @param float $pagos
     */
    public function setPagos($pagos)
    {
        $this->pagos = $pagos;
    }

    /**
     * @return float
     */
    public function getAjustes()
    {
        return $this->ajustes;
    }

    /**
     * @param float $ajustes
     */
    public function setAjustes($ajustes)
    {
        $this->ajustes = $ajustes;
    }

    /**
     * @return float
     */
    public function getDeuda()
    {
        return $this->deuda;
    }

    /**
     * @param float $deuda
     */
    public function setDeuda($deuda)
    {
        $this->deuda = $deuda;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }




}
?>