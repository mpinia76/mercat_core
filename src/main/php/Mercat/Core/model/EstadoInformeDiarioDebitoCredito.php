<?php

namespace Mercat\Core\model;
/**
 * Estado de InformeDiarioDebitoCredito
 *  
 * @author Marcos
 * @since 12-10-2022
 */

class EstadoInformeDiarioDebitoCredito{
    
    const Pendiente = 1;
    const Debitado = 3;
    const Acreditado = 4;
    
    private static $items = array(  
    								   self::Pendiente => "informeDiarioDebitoCredito.pendiente.label",
    								   self::Debitado => "informeDiarioDebitoCredito.debitado.label",
    								   self::Acreditado => "informeDiarioDebitoCredito.acreditado.label"
    								   );
    								   
	
	public static function getItems(){
		return self::$items;
	}
	
	public static function getLabel($value){
		return self::$items[$value];
	}

}
?>