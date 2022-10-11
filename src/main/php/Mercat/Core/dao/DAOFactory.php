<?php
namespace Mercat\Core\dao;

/**
 * Factory de DAOs
 *  
 * @author Marcos
 *
 */

use Mercat\Core\dao\impl\PaisDoctrineDAO;
use Mercat\Core\dao\impl\MarcaProductoDoctrineDAO;
use Mercat\Core\dao\impl\IvaDoctrineDAO;
use Mercat\Core\dao\impl\TipoProductoDoctrineDAO;




use Mercat\Core\dao\impl\ProvinciaDoctrineDAO;
use Mercat\Core\dao\impl\LocalidadDoctrineDAO;
use Mercat\Core\dao\impl\ClienteDoctrineDAO;

use Mercat\Core\dao\impl\ConceptoGastoDoctrineDAO;
use Mercat\Core\dao\impl\ConceptoMovimientoDoctrineDAO;
use Mercat\Core\dao\impl\ProductoDoctrineDAO;

use Mercat\Core\dao\impl\AnulacionDoctrineDAO;


use Mercat\Core\dao\impl\GastoDoctrineDAO;
use Mercat\Core\dao\impl\CuentaDoctrineDAO;
use Mercat\Core\dao\impl\MovimientoGastoDoctrineDAO;
use Mercat\Core\dao\impl\MovimientoCajaDoctrineDAO;
use Mercat\Core\dao\impl\VentaDoctrineDAO;
use Mercat\Core\dao\impl\MovimientoVentaDoctrineDAO;
use Mercat\Core\dao\impl\CuentaCorrienteDoctrineDAO;
use Mercat\Core\dao\impl\BancoDoctrineDAO;
use Mercat\Core\dao\impl\CajaDoctrineDAO;
use Mercat\Core\dao\impl\PagoDoctrineDAO;
use Mercat\Core\dao\impl\MovimientoPagoDoctrineDAO;
use Mercat\Core\dao\impl\TarjetaDoctrineDAO;

use Mercat\Core\dao\impl\ParametroDoctrineDAO;

use Mercat\Core\dao\impl\PackDoctrineDAO;

use Mercat\Core\dao\impl\PresupuestoDoctrineDAO;

use Mercat\Core\dao\impl\ComboDoctrineDAO;

use Mercat\Core\dao\impl\ActualizacionDoctrineDAO;

use Mercat\Core\dao\impl\MovimientoActualizacionDoctrineDAO;

use Mercat\Core\dao\impl\VendedorDoctrineDAO;

use Mercat\Core\dao\impl\DetalleVentaDoctrineDAO;

use Mercat\Core\dao\impl\DevolucionVentaDoctrineDAO;

use Mercat\Core\dao\impl\PedidoDoctrineDAO;

use Mercat\Core\dao\impl\ProveedorDoctrineDAO;

use Mercat\Core\dao\impl\MovimientoPedidoDoctrineDAO;

class DAOFactory {

	

	
	
	/**
	 * DAO para Pais.
	 * 
	 * @return IPais
	 */
	public static function getPaisDAO(){
	
		return new PaisDoctrineDAO();	
	}
	
	/**
	 * DAO para MarcaProducto.
	 * 
	 * @return IMarcaProducto
	 */
	public static function getMarcaProductoDAO(){
	
		return new MarcaProductoDoctrineDAO();	
	}
	
	/**
	 * DAO para Iva.
	 * 
	 * @return IIva
	 */
	public static function getIvaDAO(){
	
		return new IvaDoctrineDAO();	
	}
	
	/**
	 * DAO para TipoProducto.
	 * 
	 * @return ITipoProducto
	 */
	public static function getTipoProductoDAO(){
	
		return new TipoProductoDoctrineDAO();	
	}
	
	
	
	
	
	
	
	
	
	/**
	 * DAO para Provincia.
	 * 
	 * @return IProvincia
	 */
	public static function getProvinciaDAO(){
	
		return new ProvinciaDoctrineDAO();	
	}
	
	/**
	 * DAO para Localidad.
	 * 
	 * @return ILocalidad
	 */
	public static function getLocalidadDAO(){
	
		return new LocalidadDoctrineDAO();	
	}
	
	/**
	 * DAO para Cliente.
	 * 
	 * @return ICliente
	 */
	public static function getClienteDAO(){
	
		return new ClienteDoctrineDAO();	
	}
	
	
	
	/**
	 * DAO para ConceptoGasto.
	 * 
	 * @return IConceptoGasto
	 */
	public static function getConceptoGastoDAO(){
	
		return new ConceptoGastoDoctrineDAO();	
	}
	
	/**
	 * DAO para ConceptoMovimiento.
	 * 
	 * @return IConceptoMovimiento
	 */
	public static function getConceptoMovimientoDAO(){
	
		return new ConceptoMovimientoDoctrineDAO();	
	}
	
	/**
	 * DAO para Producto.
	 * 
	 * @return IProducto
	 */
	public static function getProductoDAO(){
	
		return new ProductoDoctrineDAO();	
	}
	
	
	
	/**
	 * DAO para Anulacion.
	 * 
	 * @return IAnulacion
	 */
	public static function getAnulacionDAO(){
	
		return new AnulacionDoctrineDAO();	
	}
	
	/**
	 * DAO para Cuenta.
	 * 
	 * @return ICuenta
	 */
	public static function getCuentaDAO(){
	
		return new CuentaDoctrineDAO();	
	}
	
	/**
	 * DAO para Gasto.
	 * 
	 * @return IGasto
	 */
	public static function getGastoDAO(){
	
		return new GastoDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoGasto.
	 * 
	 * @return IMovimientoGasto
	 */
	public static function getMovimientoGastoDAO(){
	
		return new MovimientoGastoDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoCaja.
	 * 
	 * @return IMovimientoCaja
	 */
	public static function getMovimientoCajaDAO(){
	
		return new MovimientoCajaDoctrineDAO();	
	}
	
	/**
	 * DAO para Venta.
	 * 
	 * @return IVenta
	 */
	public static function getVentaDAO(){
	
		return new VentaDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoVenta.
	 * 
	 * @return IMovimientoVenta
	 */
	public static function getMovimientoVentaDAO(){
	
		return new MovimientoVentaDoctrineDAO();	
	}
	
	/**
	 * DAO para CuentaCorriente.
	 * 
	 * @return ICuentaCorriente
	 */
	public static function getCuentaCorrienteDAO(){
	
		return new CuentaCorrienteDoctrineDAO();	
	}
	
	/**
	 * DAO para Banco.
	 * 
	 * @return IBanco
	 */
	public static function getBancoDAO(){
	
		return new BancoDoctrineDAO();	
	}
	
	/**
	 * DAO para Caja.
	 * 
	 * @return ICaja
	 */
	public static function getCajaDAO(){
	
		return new CajaDoctrineDAO();	
	}
	
	/**
	 * DAO para Pago.
	 * 
	 * @return IPago
	 */
	public static function getPagoDAO(){
	
		return new PagoDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoPago.
	 * 
	 * @return IMovimientoPago
	 */
	public static function getMovimientoPagoDAO(){
	
		return new MovimientoPagoDoctrineDAO();	
	}
	
	/**
	 * DAO para Tarjeta.
	 * 
	 * @return ITarjeta
	 */
	public static function getTarjetaDAO(){
	
		return new TarjetaDoctrineDAO();	
	}
	
	
	
	/**
	 * DAO para Parametro.
	 * 
	 * @return IParametro
	 */
	public static function getParametroDAO(){
	
		return new ParametroDoctrineDAO();	
	}
	
	/**
	 * DAO para Pack.
	 * 
	 * @return IPack
	 */
	public static function getPackDAO(){
	
		return new PackDoctrineDAO();	
	}
	
	/**
	 * DAO para Presupuesto.
	 * 
	 * @return IPresupuesto
	 */
	public static function getPresupuestoDAO(){
	
		return new PresupuestoDoctrineDAO();	
	}
	
	
	/**
	 * DAO para Combo.
	 * 
	 * @return ICombo
	 */
	public static function getComboDAO(){
	
		return new ComboDoctrineDAO();	
	}
	
	/**
	 * DAO para Actualizacion.
	 * 
	 * @return IActualizacion
	 */
	public static function getActualizacionDAO(){
	
		return new ActualizacionDoctrineDAO();	
	}
	
	/**
	 * DAO para MovimientoActualizacion.
	 * 
	 * @return IMovimientoActualizacion
	 */
	public static function getMovimientoActualizacionDAO(){
	
		return new MovimientoActualizacionDoctrineDAO();	
	}
	
	/**
	 * DAO para Vendedor.
	 * 
	 * @return IVendedor
	 */
	public static function getVendedorDAO(){
	
		return new VendedorDoctrineDAO();	
	}
	
	/**
	 * DAO para DetalleVenta.
	 * 
	 * @return IDetalleVenta
	 */
	public static function getDetalleVentaDAO(){
	
		return new DetalleVentaDoctrineDAO();	
	}
	
	/**
	 * DAO para DevolucionVenta.
	 * 
	 * @return IDevolucionVenta
	 */
	public static function getDevolucionVentaDAO(){
	
		return new DevolucionVentaDoctrineDAO();	
	}
	
	
	/**
	 * DAO para Pedido.
	 * 
	 * @return IPedido
	 */
	public static function getPedidoDAO(){
	
		return new PedidoDoctrineDAO();	
	}
	
	/**
	 * DAO para Proveedor.
	 * 
	 * @return IProveedor
	 */
	public static function getProveedorDAO(){
	
		return new ProveedorDoctrineDAO();	
	}

	/**
	 * DAO para MovimientoPedido.
	 * 
	 * @return IMovimientoPedido
	 */
	public static function getMovimientoPedidoDAO(){
	
		return new MovimientoPedidoDoctrineDAO();	
	}
}
