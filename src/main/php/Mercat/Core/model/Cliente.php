<?php

namespace Mercat\Core\model;

use Cose\model\impl\Entity;


use Cose\utils\Logger;
use Mercat\Core\model\Persona;

/**
 * Cliente
 * 
 * @Entity @Table(name="mercat_cliente")
 * 
 * @author Marcos
 */

class Cliente extends Persona{

	//variables de instancia.


	
	 /**
	 * @Column(type="string", length=13)
	 */
	private $cuit;
	

	
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

    /**
     * @return mixed
     */
    public function getCuit()
    {
        return $this->cuit;
    }

    /**
     * @param mixed $cuit
     */
    public function setCuit($cuit)
    {
        $this->cuit = $cuit;
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


}
?>