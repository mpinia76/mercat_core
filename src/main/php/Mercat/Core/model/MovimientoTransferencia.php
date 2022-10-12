<?php

namespace Mercat\Core\model;

use Cose\utils\Logger;

/**
 * Movimiento de cuenta por Transferencia
 * 
 * @Entity
 * 
 * @author Marcos
 * @since 12-10-2022
 */

class MovimientoTransferencia extends MovimientoCaja{

	//variables de instancia.

	/**
     * @ManyToOne(targetEntity="Transferencia",cascade={"merge"})
     * @JoinColumn(name="transferencia_oid", referencedColumnName="oid", nullable=true)
     * @var Transferencia
     **/
	private $transferencia;
	
	
	public function __construct(){
	}
	
	public function __toString(){
		 return "oid de transferencia";
	}
	

	public function getTransferencia()
	{
	    return $this->transferencia;
	}

	public function setTransferencia($transferencia)
	{
	    $this->transferencia = $transferencia;
	}
	
	public function getDescripcion(){
		
		$descripcion = parent::getDescripcion();
		
		$mercat = $this->getTransferencia()->getOrigen() . "-" . $this->getTransferencia()->getDestino();
		
		$observaciones = $this->getObservaciones();
		
		return parent::getDescripcion() . " / " . $mercat . " " .  (!empty($observaciones)?" / $observaciones" :"");
		
	}
	
	protected function buildInstance(){
		return new MovimientoTransferencia();
	}
	
	public function buildContramovimiento(){

		$movimiento = parent::buildContramovimiento();
		$movimiento->setTransferencia( $this->getTransferencia() );

		return $movimiento;
	}
	
	public  function podesAnularte(){
		
		return $this->getTransferencia()->getEstado() != EstadoTransferencia::Anulada;
		
	}
}
?>