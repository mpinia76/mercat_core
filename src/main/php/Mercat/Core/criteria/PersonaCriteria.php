<?php
namespace Mercat\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de persona
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
class PersonaCriteria extends Criteria{

	private $nombre;



	private $oidNotEqual;
	
	private $documento;
	
	private $tipoDocumento;
	
	private $nombreEqual;

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getOidNotEqual()
    {
        return $this->oidNotEqual;
    }

    /**
     * @param mixed $oidNotEqual
     */
    public function setOidNotEqual($oidNotEqual)
    {
        $this->oidNotEqual = $oidNotEqual;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * @param mixed $tipoDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    /**
     * @return mixed
     */
    public function getNombreEqual()
    {
        return $this->nombreEqual;
    }

    /**
     * @param mixed $nombreEqual
     */
    public function setNombreEqual($nombreEqual)
    {
        $this->nombreEqual = $nombreEqual;
    }
	

		


}