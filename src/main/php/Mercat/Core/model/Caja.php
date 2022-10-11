<?php

namespace Mercat\Core\model;

use Mercat\Core\utils\MercatUtils;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * Caja
 * 
 * @Entity @Table(name="cts_caja")
 * 
 * @author Bernardo
 * @since 22-05-2014
 */

class Caja extends Cuenta{

	//variables de instancia.

	/**
	 * @Column(type="time")
	 * @var \Datetime
	 */
	private $horaApertura;
	
	/**
	 * @Column(type="time", nullable=true)
	 * @var \Datetime
	 */
	private $horaCierre;
	
	/**
     * @ManyToOne(targetEntity="Empleado",cascade={"detach"})
     * @JoinColumn(name="cajero_oid", referencedColumnName="oid")
     * @var Empleado
     **/
	private $cajero;
	
	

	
	
	public function __construct(){
	}
	
	public function __toString(){
		 return  "Caja " . $this->getNumero();// . " - " .MercatUtils::formatDateToView($this->getFecha());// . " - " .MercatUtils::formatTimeToView($this->getHoraApertura()) . " - " .MercatUtils::formatMontoToView($this->getSaldo()) ;
	}


	protected function doEncrypt(){
	
//		if( $this->getCajero() != null )
//			$this->getCajero()->doEncrypt();
		
	}
	
	protected function doDecrypt(){
		
//		if( $this->getCajero() != null )
//			$this->getCajero()->doDecrypt();
	}
	

	public function getHoraApertura()
	{
	    return $this->horaApertura;
	}

	public function setHoraApertura($horaApertura)
	{
	    $this->horaApertura = $horaApertura;
	}

	public function getHoraCierre()
	{
	    return $this->horaCierre;
	}

	public function setHoraCierre($horaCierre)
	{
	    $this->horaCierre = $horaCierre;
	}

	public function getCajero()
	{
	    return $this->cajero;
	}

	public function setCajero($cajero)
	{
	    $this->cajero = $cajero;
	}

    public function getSucursal()
    {
        return $this->sucursal;
    }

    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;
    }
    
    public function isAbierta(){
    	return empty($this->horaCierre);
    }
    
    public function getRecaudacion(){
    	
    	return $this->getSaldo() - $this->getSaldoInicial();
    }
    
}
?>