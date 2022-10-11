<?php

namespace Mercat\Core\model;

use Mercat\Core\utils\MercatUtils;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * Caja chica
 * 
 * @Entity @Table(name="mercat_caja_chica")
 * 
 * @author Marcos
 * @since 11-10-2022
 */

class CajaChica extends Cuenta{

	//variables de instancia.


	
	
	public function __construct(){
	}
	
	public function __toString(){
		 return  "Caja Chica"; // .MercatUtils::formatMontoToView($this->getSaldo()) ;
	}
    

    
}
?>