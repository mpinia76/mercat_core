<?php

namespace Mercat\Core\model;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * InformeDiarioDebitoCredito
 * 
 * Informe diario de débito o crédito de loterías
 * 
 * 
 * @Entity @Table(name="mercat_informe_diario_debito_debito")
 * 
 * @author Marcos
 * @since 12-10-2022
 */

class InformeDiarioDebitoCredito extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="date")
	 * @var \Datetime
	 */
	private $fecha;
	
	/**
	 * @Column(type="date")
	 * @var \Datetime
	 */
	private $fechaVencimiento;
	
	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $debito;

	/**
	 * @Column(type="float")
	 * @var float
	 */
	private $credito;
		

	/**
     * @ManyToOne(targetEntity="Cose\Security\model\User",cascade={"detach"})
     * @JoinColumn(name="user_oid", referencedColumnName="oid")
     * 
     * usuario q generó la operación
     **/
    private $user;
    
	
	/**
     * @ManyToOne(targetEntity="Banco",cascade={"merge"})
     * @JoinColumn(name="banco_oid", referencedColumnName="oid", nullable=true)
     * @var Sucursal
     **/
	private $banco;
	
	/**
	 * @Column(type="integer")
	 * @var EstadoInformeDiarioDebitoCredito
	 */
	private $estado;
	
	public function __construct(){
	}
	
	public function __toString(){
		 return "";
	}



	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
	}

	public function getFechaVencimiento()
	{
	    return $this->fechaVencimiento;
	}

	public function setFechaVencimiento($fechaVencimiento)
	{
	    $this->fechaVencimiento = $fechaVencimiento;
	}

	public function getDebito()
	{
	    return $this->debito;
	}

	public function setDebito($debito)
	{
	    $this->debito = $debito;
	}

	public function getCredito()
	{
	    return $this->credito;
	}

	public function setCredito($credito)
	{
	    $this->credito = $credito;
	}

	public function getSucursal()
	{
	    return $this->sucursal;
	}

	public function setSucursal($sucursal)
	{
	    $this->sucursal = $sucursal;
	}

	public function getUser()
	{
	    return $this->user;
	}

	public function setUser($user)
	{
	    $this->user = $user;
	}

	public function getEstado()
	{
	    return $this->estado;
	}

	public function setEstado($estado)
	{
	    $this->estado = $estado;
	}

	public function getBanco()
	{
	    return $this->banco;
	}

	public function setBanco($banco)
	{
	    $this->banco = $banco;
	}
	
	public function podesAcreditarte(){
		
		//debe ser de crédito y en estado pendiente.
		$podes = ( $this->getCredito() > 0 ) && ($this->getEstado() == EstadoInformeDiarioDebitoCredito::Pendiente);
		
		return $podes;
	}
	
	public function podesDebitarte(){
		
		//debe ser de débito y en estado depositado.
		$podes = ( $this->getDebito() > 0 ) && ($this->getEstado() == EstadoInformeDiarioDebitoCredito::Pendiente);
		
		return $podes;
	}
	
	public function podesEditarte(){
		
		return $this->getEstado() == EstadoInformeDiarioDebitoCredito::Pendiente;
	}
	
}
?>