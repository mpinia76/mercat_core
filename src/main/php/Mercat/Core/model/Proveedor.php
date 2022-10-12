<?php

namespace Mercat\Core\model;

use Cose\model\impl\Entity;


use Cose\utils\Logger;
use Mercat\Core\model\Persona;

/**
 * Proveedor
 * 
 * @Entity @Table(name="mercat_proveedor")
 * 
 * @author Marcos
 */

class Proveedor extends Persona{

	//variables de instancia.


	
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $razonSocial;

	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $cuit;
	
	/**
	 * @Column(type="integer", nullable=true)
	 * @var CondicionIva
	 */
	private $condicionIva;
	

	
	/**
	 * @Column(type="datetime")
	 * @var \Datetime
	 */
	private $fecha;
	
	/**
	 * @Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
	 * @var \Datetime
	 */
	private $ultModificacion;
	

	
	
	/**
     * @ManyToOne(targetEntity="CuentaCorriente",cascade={"merge"})
     * @JoinColumn(name="cuentaCorriente_oid", referencedColumnName="oid")
     * @var CuentaCorriente
     **/
	private $cuentaCorriente;
		
	public function __construct(){
	}
	

	
	public function getSaldo(){
		
		$ctacte = $this->getCuentaCorriente();
		$saldo = null;
		if(!empty($ctacte)){
			
			$saldo = $ctacte->getSaldo();
		}
		
		return $saldo;
	}
	
	public function hasCuentaCorriente(){
		
		$ctacte = $this->getCuentaCorriente();
		$saldo = null;
		return (!empty($ctacte));
	}

    /**
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * @param string $razonSocial
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    }

    /**
     * @return string
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * @param string $cuit
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
    }

    /**
     * @return CondicionIva
     */
    public function getCondicionIva()
    {
        return $this->condicionIva;
    }

    /**
     * @param CondicionIva $condicionIva
     */
    public function setCondicionIva($condicionIva)
    {
        $this->condicionIva = $condicionIva;
    }

    /**
     * @return \Datetime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param \Datetime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return \Datetime
     */
    public function getUltModificacion()
    {
        return $this->ultModificacion;
    }

    /**
     * @param \Datetime $ultModificacion
     */
    public function setUltModificacion($ultModificacion)
    {
        $this->ultModificacion = $ultModificacion;
    }

    /**
     * @return CuentaCorriente
     */
    public function getCuentaCorriente()
    {
        return $this->cuentaCorriente;
    }

    /**
     * @param CuentaCorriente $cuentaCorriente
     */
    public function setCuentaCorriente($cuentaCorriente)
    {
        $this->cuentaCorriente = $cuentaCorriente;
    }


}
?>