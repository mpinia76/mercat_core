<?php

namespace Mercat\Core\model;
/**
 * Estado de Transferencia
 *  
 * @author Bernardo
 * @since 03-06-2014
 */

class EstadoTransferencia{
    
    const Realizada = 1;
    const Anulada = 2;
    
    
    private static $items = array(  
    								   self::Realizada => "transferencia.realizada.label",
    								   self::Anulada => "transferencia.anulada.label"
    								   );
    								   
	
	public static function getItems(){
		return self::$items;
	}
	
	public static function getLabel($value){
		return self::$items[$value];
	}


}
?>
