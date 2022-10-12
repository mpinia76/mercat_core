<?php

namespace Mercat\Core\model;

use Cose\model\impl\Entity;

use Cose\utils\Logger;

/**
 * 
 * Representa una persona (cliente, empleado, proveedor, etc)
 * 
 * @Entity @Table(name="mercat_persona")
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"cliente" = "Cliente", "empleado" = "Empleado", "proveedor" = "Proveedor"}) 
 * 
 * 
 * @author Marcos
 * @since 11-10-2022
 */
abstract class Persona extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $nombre;

	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	
	private $mail;
	

	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $telefono;
	

	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $celular;
    
	
	
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $direccion;
	
	
	/**
	 * @Column(type="string", nullable=true)
	 * @var string
	 */
	private $observaciones;
	
	/** 
	 * @Column(type="string", nullable=true)
	 *  
	 **/
	private $documento;

	/**
	 * @Column(type="integer", nullable=true)
	 * @var unknown_type
	 */
	private $tipoDocumento;
	
	
	/**
	 * @Column(type="integer", nullable=true)
	 * @var unknown_type
	 */
	private $sexo;
	
		 
	/** 
	 * @Column(type="date", nullable=true)
	 *  
	 **/
	private $nacimiento;
	
	
	public function __construct(){
	}
	
	public function __toString(){
        return $this->getNombre();
	}


	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getApellido()
	{
	    return $this->apellido;
	}

	public function setApellido($apellido)
	{
	    $this->apellido = $apellido;
	}

	public function getMail()
	{
	    return $this->mail;
	}

	public function setMail($mail)
	{
	    $this->mail = $mail;
	}

	public function getTelefono()
	{
	    return $this->telefono;
	}

	public function setTelefono($telefono)
	{
	    $this->telefono = $telefono;
	}

	public function getCelular()
	{
	    return $this->celular;
	}

	public function setCelular($celular)
	{
	    $this->celular = $celular;
	}

	public function getDireccion()
	{
	    return $this->direccion;
	}

	public function setDireccion($direccion)
	{
	    $this->direccion = $direccion;
	}

	public function getObservaciones()
	{
	    return $this->observaciones;
	}

	public function setObservaciones($observaciones)
	{
	    $this->observaciones = $observaciones;
	}

	public function getDocumento()
	{
	    return $this->documento;
	}

	public function setDocumento($documento)
	{
	    $this->documento = $documento;
	}

	public function getTipoDocumento()
	{
	    return $this->tipoDocumento;
	}

	public function setTipoDocumento($tipoDocumento)
	{
	    $this->tipoDocumento = $tipoDocumento;
	}

	public function getSexo()
	{
	    return $this->sexo;
	}

	public function setSexo($sexo)
	{
	    $this->sexo = $sexo;
	}

	public function getNacimiento()
	{
	    return $this->nacimiento;
	}

	public function setNacimiento($nacimiento)
	{
	    $this->nacimiento = $nacimiento;
	}
}
?>