<?php

namespace Mercat\Core\model;

use Cose\model\impl\Entity;

use Turnos\Core\model\Profesional;
use Cose\utils\Logger;

/**
 * @Entity @Table(name="mercat_empleado")
 * 
 * @author Marcos
 * @since 11-10-2022
 */
class Empleado extends Persona{

	//variables de instancia.
    
    /**
     * @ManyToOne(targetEntity="Cose\Security\model\User",cascade={"detach"})
     * @JoinColumn(name="user_oid", referencedColumnName="oid")
     **/
    private $user;
	
	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $numero;

	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $cuil;
	
	/**
	 * @Column(type="datetime")
	 * @var \Datetime
	 * 
	 * (para la antiguedad)
	 */
	private $fechaIngreso;
	
	/*
	 * para liquidación sueldo:
	 *  antigüedad
	 *  categoría
	 * 
	 */ 
	
	
	public function __construct(){
	}
	

	protected function doEncrypt(){
	
		if( $this->getUser() != null )
			$this->getUser()->doEncrypt();
		
	}
	
	protected function doDecrypt(){
		
		if( $this->getUser() != null )
			$this->getUser()->doDecrypt();
	}
	
	

	public function getNumero()
	{
	    return $this->numero;
	}

	public function setNumero($numero)
	{
	    $this->numero = $numero;
	}

	public function getCuil()
	{
	    return $this->cuil;
	}

	public function setCuil($cuil)
	{
	    $this->cuil = $cuil;
	}

	public function getFechaIngreso()
	{
	    return $this->fechaIngreso;
	}

	public function setFechaIngreso($fechaIngreso)
	{
	    $this->fechaIngreso = $fechaIngreso;
	}

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }
}
?>