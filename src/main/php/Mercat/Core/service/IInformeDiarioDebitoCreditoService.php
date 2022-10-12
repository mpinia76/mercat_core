<?php
namespace Mercat\Core\service;


use Mercat\Core\model\InformeDiarioDebitoCredito;

use Cose\Crud\service\ICrudService;

/**
 * interfaz para el servicio de InformeDiarioDebitoCredito
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
interface IInformeDiarioDebitoCreditoService extends ICrudService {
	
	/**
	 * se acredita el informe.
	 * Realiza la transferencia del crédito desde la cuenta
	 * de Loterías al banco especificado en el informe.
	 * 
	 * @param InformeDiarioDebitoCredito $informe
	 */
	function acreditar( InformeDiarioDebitoCredito $informe );
	
	/**
	 * se debita el informe.
	 * Realiza la transferencia del débito desde el banco 
	 * especificado en el informe a la cuenta de Loterías.
	 * 
	 * @param InformeDiarioDebitoCredito $informe
	 */
	function debitar( InformeDiarioDebitoCredito $informe );
	
	/**
	 * Confirma todos los informes pendientes que vencen hoy.
	 * Los débitos los debita y los créditos los acredita.
	 */
	function confirmarPendientes();
	
	function getPendientes();
}