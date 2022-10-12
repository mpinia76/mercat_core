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
	private $fecha;

    /**
     * @Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     * @var \Datetime
     */
    private $ultModificacion;

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

	public function getFecha()
	{
	    return $this->fecha;
	}

	public function setFecha($fecha)
	{
	    $this->fecha = $fecha;
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