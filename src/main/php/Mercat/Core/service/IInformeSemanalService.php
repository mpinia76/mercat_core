<?php
namespace Mercat\Core\service;


use Cose\Crud\service\ICrudService;

/**
 * interfaz para el servicio de InformeSemanal
 *  
 * @author Marcos
 * @since 12-10-2022
 *
 */
interface IInformeSemanalService extends ICrudService {
	
	public function getInformeAnualPorMes($anio);
	
	public function getInformeAnualPorSemana($anio);	
}