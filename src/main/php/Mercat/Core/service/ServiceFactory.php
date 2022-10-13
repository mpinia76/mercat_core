<?php
namespace Mercat\Core\service;

/**
 * Factory de servicios
 *  
 *  
 * @author Marcos
 * @since 27-02-2018
 *
 */

use Mercat\Core\service\impl\PaisServiceImpl;
use Mercat\Core\service\impl\MarcaProductoServiceImpl;
use Mercat\Core\service\impl\IvaServiceImpl;
use Mercat\Core\service\impl\TipoProductoServiceImpl;

use Mercat\Core\service\impl\ConceptoGastoServiceImpl;
use Mercat\Core\service\impl\ConceptoMovimientoServiceImpl;
use Mercat\Core\service\impl\ProvinciaServiceImpl;
use Mercat\Core\service\impl\LocalidadServiceImpl;
use Mercat\Core\service\impl\ClienteServiceImpl;
use Mercat\Core\service\impl\EmpleadoServiceImpl;


use Mercat\Core\service\impl\ProductoServiceImpl;

use Mercat\Core\service\impl\AnulacionServiceImpl;
use Mercat\Core\service\impl\CuentaServiceImpl;
use Mercat\Core\service\impl\GastoServiceImpl;

use Mercat\Core\service\impl\MovimientoGastoServiceImpl;
use Mercat\Core\service\impl\VentaServiceImpl;
use Mercat\Core\service\impl\MovimientoVentaServiceImpl;
use Mercat\Core\service\impl\MovimientoCajaServiceImpl;
use Mercat\Core\service\impl\CuentaCorrienteServiceImpl;
use Mercat\Core\service\impl\BancoServiceImpl;
use Mercat\Core\service\impl\CajaServiceImpl;
use Mercat\Core\service\impl\CajaChicaServiceImpl;
use Mercat\Core\service\impl\PagoServiceImpl;
use Mercat\Core\service\impl\MovimientoPagoServiceImpl;
use Mercat\Core\service\impl\TarjetaServiceImpl;

use Mercat\Core\service\impl\ParametroServiceImpl;

use Mercat\Core\service\impl\PackServiceImpl;

use Mercat\Core\service\impl\PresupuestoServiceImpl;

use Mercat\Core\service\impl\ComboServiceImpl;

use Mercat\Core\service\impl\ActualizacionServiceImpl;

use Mercat\Core\service\impl\MovimientoActualizacionServiceImpl;

use Mercat\Core\service\impl\VendedorServiceImpl;

use Mercat\Core\service\impl\DetalleVentaServiceImpl;

use Mercat\Core\service\impl\DevolucionVentaServiceImpl;

use Mercat\Core\service\impl\PedidoServiceImpl;

use Mercat\Core\service\impl\ProveedorServiceImpl;

use Mercat\Core\service\impl\MovimientoPedidoServiceImpl;

use Mercat\Core\service\impl\MovimientoCuentaServiceImpl;

use Mercat\Core\service\impl\TransferenciaServiceImpl;

use Mercat\Core\service\impl\MovimientoTransferenciaServiceImpl;

use Mercat\Core\service\impl\InformeDiarioDebitoCreditoServiceImpl;

use Mercat\Core\service\impl\InformeSemanalServiceImpl;

class ServiceFactory {


	
	
	
	
	
	
	/**
	 * Service para Pais.
	 * 
	 * @return IPaisService
	 */
	public static function getPaisService(){
	
		return new PaisServiceImpl();	
	}
	
	/**
	 * Service para MarcaProducto.
	 * 
	 * @return IMarcaProductoService
	 */
	public static function getMarcaProductoService(){
	
		return new MarcaProductoServiceImpl();	
	}
	
	/**
	 * Service para Iva.
	 * 
	 * @return IIvaService
	 */
	public static function getIvaService(){
	
		return new IvaServiceImpl();	
	}
	
	/**
	 * Service para TipoProducto.
	 * 
	 * @return ITipoProductoService
	 */
	public static function getTipoProductoService(){
	
		return new TipoProductoServiceImpl();	
	}
	
	
	
	
	/**
	 * Service para ConceptoGasto.
	 * 
	 * @return IConceptoGastoService
	 */
	public static function getConceptoGastoService(){
	
		return new ConceptoGastoServiceImpl();	
	}
	
	/**
	 * Service para ConceptoMovimiento.
	 * 
	 * @return IConceptoMovimientoService
	 */
	public static function getConceptoMovimientoService(){
	
		return new ConceptoMovimientoServiceImpl();	
	}
	
	
	/**
	 * Service para Provincia.
	 * 
	 * @return IProvinciaService
	 */
	public static function getProvinciaService(){
	
		return new ProvinciaServiceImpl();	
	}
	
	/**
	 * Service para Localidad.
	 * 
	 * @return ILocalidadService
	 */
	public static function getLocalidadService(){
	
		return new LocalidadServiceImpl();	
	}
	
	/**
	 * Service para Cliente.
	 * 
	 * @return IClienteService
	 */
	public static function getClienteService(){
	
		return new ClienteServiceImpl();	
	}

    /**
     * Service para Empleado.
     *
     * @return IEmpleadoService
     */
    public static function getEmpleadoService(){

        return new EmpleadoServiceImpl();
    }


    /**
     * Service para InformeSemanal.
     *
     * @return IInformeSemanalService
     */
    public static function getInformeSemanalService(){

        return new InformeSemanalServiceImpl();
    }



    /**
     * Service para InformeDiarioDebitoCredito.
     *
     * @return IInformeDiarioDebitoCreditoService
     */
    public static function getInformeDiarioDebitoCreditoService(){

        return new InformeDiarioDebitoCreditoServiceImpl();
    }



    /**
	 * Service para Producto.
	 * 
	 * @return IProductoService
	 */
	public static function getProductoService(){
	
		return new ProductoServiceImpl();	
	}
	
	
	
	/**
	 * Service para Anulacion.
	 * 
	 * @return IAnulacionService
	 */
	public static function getAnulacionService(){
	
		return new AnulacionServiceImpl();	
	}
	
	/**
	 * Service para Cuenta.
	 * 
	 * @return ICuentaService
	 */
	public static function getCuentaService(){
	
		return new CuentaServiceImpl();	
	}
	
	/**
	 * Service para Gasto.
	 * 
	 * @return IGastoService
	 */
	public static function getGastoService(){
	
		return new GastoServiceImpl();	
	}
	
	/**
	 * Service para MovimientoGasto.
	 * 
	 * @return IMovimientoGastoService
	 */
	public static function getMovimientoGastoService(){
	
		return new MovimientoGastoServiceImpl();	
	}

    /**
     * Service para MovimientoCuenta.
     *
     * @return IMovimientoCuentaService
     */
    public static function getMovimientoCuentaService(){

        return new MovimientoCuentaServiceImpl();
    }
	
	/**
	 * Service para Venta.
	 * 
	 * @return IVentaService
	 */
	public static function getVentaService(){
	
		return new VentaServiceImpl();	
	}	
	
	/**
	 * Service para MovimientoVenta.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoVentaService(){
	
		return new MovimientoVentaServiceImpl();	
	}
	
	/**
	 * Service para MovimientoCaja.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getMovimientoCajaService(){
	
		return new MovimientoCajaServiceImpl();	
	}
	
	/**
	 * Service para CuentaCorriente.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getCuentaCorrienteService(){
	
		return new CuentaCorrienteServiceImpl();	
	}
	
	/**
	 * Service para Banco.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getBancoService(){
	
		return new BancoServiceImpl();	
	}
	
	/**
	 * Service para Caja.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getCajaService(){
	
		return new CajaServiceImpl();	
	}

    /**
     * Service para CajaChica.
     *
     * @return IMovimientoCuentaService
     */
    public static function getCajaChicaService(){

        return new CajaChicaServiceImpl();
    }
	
	/**
	 * Service para Pago.
	 * 
	 * @return IMovimientoCuentaService
	 */
	public static function getPagoService(){
	
		return new PagoServiceImpl();	
	}
	
	/**
	 * Service para MovimientoPago.
	 * 
	 * @return IMovimientoPagoService
	 */
	public static function getMovimientoPagoService(){
	
		return new MovimientoPagoServiceImpl();	
	}
	
	/**
	 * Service para Tarjeta.
	 * 
	 * @return ITarjetaService
	 */
	public static function getTarjetaService(){
	
		return new TarjetaServiceImpl();	
	}
	
	
	
	/**
	 * Service para Parametro.
	 * 
	 * @return IParametroService
	 */
	public static function getParametroService(){
	
		return new ParametroServiceImpl();	
	}
	
	/**
	 * Service para Pack.
	 * 
	 * @return IPackService
	 */
	public static function getPackService(){
	
		return new PackServiceImpl();	
	}
	
	/**
	 * Service para Presupuesto.
	 * 
	 * @return IPresupuestoService
	 */
	public static function getPresupuestoService(){
	
		return new PresupuestoServiceImpl();	
	}
	
	/**
	 * Service para Combo.
	 * 
	 * @return IComboService
	 */
	public static function getComboService(){
	
		return new ComboServiceImpl();	
	}
	
	/**
	 * Service para Actualizacion.
	 * 
	 * @return IActualizacionService
	 */
	public static function getActualizacionService(){
	
		return new ActualizacionServiceImpl();	
	}
	
	
	/**
	 * Service para MovimientoActualizacion.
	 * 
	 * @return IMovimientoActualizacionService
	 */
	public static function getMovimientoActualizacionService(){
	
		return new MovimientoActualizacionServiceImpl();	
	}
	
	/**
	 * Service para Vendedor.
	 * 
	 * @return IVendedorService
	 */
	public static function getVendedorService(){
	
		return new VendedorServiceImpl();	
	}
	
	/**
	 * Service para DetalleVenta.
	 * 
	 * @return IDetalleVentaService
	 */
	public static function getDetalleVentaService(){
	
		return new DetalleVentaServiceImpl();	
	}
	
	/**
	 * Service para DevolucionVenta.
	 * 
	 * @return IDevolucionVentaService
	 */
	public static function getDevolucionVentaService(){
	
		return new DevolucionVentaServiceImpl();	
	}
	
	/**
	 * Service para Pedido.
	 * 
	 * @return IPedidoService
	 */
	public static function getPedidoService(){
	
		return new PedidoServiceImpl();	
	}
	
	/**
	 * Service para Proveedor.
	 * 
	 * @return IProveedorService
	 */
	public static function getProveedorService(){
	
		return new ProveedorServiceImpl();	
	}

	/**
	 * Service para MovimientoPedido.
	 * 
	 * @return IMovimientoPedidoService
	 */
	public static function getMovimientoPedidoService(){
	
		return new MovimientoPedidoServiceImpl();	
	}

    /**
     * Service para Transferencia.
     *
     * @return ITransferenciaService
     */
    public static function getTransferenciaService(){

        return new TransferenciaServiceImpl();
    }

    /**
     * Service para MovimientoTransferencia.
     *
     * @return IMovimientoTransferenciaService
     */
    public static function getMovimientoTransferenciaService(){

        return new MovimientoTransferenciaServiceImpl();
    }
	
}