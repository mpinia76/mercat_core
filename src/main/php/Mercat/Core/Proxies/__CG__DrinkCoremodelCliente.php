<?php

namespace mercat\Core\Proxies\__CG__\Mercat\Core\model;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Cliente extends \Mercat\Core\model\Cliente implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'nombre', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'tipoCliente', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'tipoDocumento', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'documento', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'cuit', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'sexo', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'mail', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'telefono', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'celular', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'laboral', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'localidad', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'direccion', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'nacimiento', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'fecha', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'ultModificacion', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'observaciones', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'cuentaCorriente'];
        }

        return ['__isInitialized__', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'nombre', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'tipoCliente', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'tipoDocumento', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'documento', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'cuit', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'sexo', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'mail', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'telefono', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'celular', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'laboral', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'localidad', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'direccion', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'nacimiento', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'fecha', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'ultModificacion', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'observaciones', '' . "\0" . 'Mercat\\Core\\model\\Cliente' . "\0" . 'cuentaCorriente'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Cliente $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', []);

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre($nombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', [$nombre]);

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipoDocumento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipoDocumento', []);

        return parent::getTipoDocumento();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipoDocumento($tipoDocumento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipoDocumento', [$tipoDocumento]);

        return parent::setTipoDocumento($tipoDocumento);
    }

    /**
     * {@inheritDoc}
     */
    public function getDocumento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDocumento', []);

        return parent::getDocumento();
    }

    /**
     * {@inheritDoc}
     */
    public function setDocumento($documento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDocumento', [$documento]);

        return parent::setDocumento($documento);
    }

    /**
     * {@inheritDoc}
     */
    public function getCuit()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCuit', []);

        return parent::getCuit();
    }

    /**
     * {@inheritDoc}
     */
    public function setCuit($cuit)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCuit', [$cuit]);

        return parent::setCuit($cuit);
    }

    /**
     * {@inheritDoc}
     */
    public function getSexo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSexo', []);

        return parent::getSexo();
    }

    /**
     * {@inheritDoc}
     */
    public function setSexo($sexo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSexo', [$sexo]);

        return parent::setSexo($sexo);
    }

    /**
     * {@inheritDoc}
     */
    public function getMail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMail', []);

        return parent::getMail();
    }

    /**
     * {@inheritDoc}
     */
    public function setMail($mail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMail', [$mail]);

        return parent::setMail($mail);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefono()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefono', []);

        return parent::getTelefono();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefono($telefono)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefono', [$telefono]);

        return parent::setTelefono($telefono);
    }

    /**
     * {@inheritDoc}
     */
    public function getCelular()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCelular', []);

        return parent::getCelular();
    }

    /**
     * {@inheritDoc}
     */
    public function setCelular($celular)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCelular', [$celular]);

        return parent::setCelular($celular);
    }

    /**
     * {@inheritDoc}
     */
    public function getLaboral()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLaboral', []);

        return parent::getLaboral();
    }

    /**
     * {@inheritDoc}
     */
    public function setLaboral($laboral)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLaboral', [$laboral]);

        return parent::setLaboral($laboral);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocalidad()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocalidad', []);

        return parent::getLocalidad();
    }

    /**
     * {@inheritDoc}
     */
    public function setLocalidad($localidad)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLocalidad', [$localidad]);

        return parent::setLocalidad($localidad);
    }

    /**
     * {@inheritDoc}
     */
    public function getDireccion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDireccion', []);

        return parent::getDireccion();
    }

    /**
     * {@inheritDoc}
     */
    public function setDireccion($direccion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDireccion', [$direccion]);

        return parent::setDireccion($direccion);
    }

    /**
     * {@inheritDoc}
     */
    public function getNacimiento()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNacimiento', []);

        return parent::getNacimiento();
    }

    /**
     * {@inheritDoc}
     */
    public function setNacimiento($nacimiento)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNacimiento', [$nacimiento]);

        return parent::setNacimiento($nacimiento);
    }

    /**
     * {@inheritDoc}
     */
    public function getFecha()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFecha', []);

        return parent::getFecha();
    }

    /**
     * {@inheritDoc}
     */
    public function setFecha($fecha)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFecha', [$fecha]);

        return parent::setFecha($fecha);
    }

    /**
     * {@inheritDoc}
     */
    public function getUltModificacion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUltModificacion', []);

        return parent::getUltModificacion();
    }

    /**
     * {@inheritDoc}
     */
    public function setUltModificacion($ultModificacion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUltModificacion', [$ultModificacion]);

        return parent::setUltModificacion($ultModificacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getObservaciones()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getObservaciones', []);

        return parent::getObservaciones();
    }

    /**
     * {@inheritDoc}
     */
    public function setObservaciones($observaciones)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setObservaciones', [$observaciones]);

        return parent::setObservaciones($observaciones);
    }

    /**
     * {@inheritDoc}
     */
    public function getCuentaCorriente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCuentaCorriente', []);

        return parent::getCuentaCorriente();
    }

    /**
     * {@inheritDoc}
     */
    public function setCuentaCorriente($cuentaCorriente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCuentaCorriente', [$cuentaCorriente]);

        return parent::setCuentaCorriente($cuentaCorriente);
    }

    /**
     * {@inheritDoc}
     */
    public function getSaldo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSaldo', []);

        return parent::getSaldo();
    }

    /**
     * {@inheritDoc}
     */
    public function hasCuentaCorriente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasCuentaCorriente', []);

        return parent::hasCuentaCorriente();
    }

    /**
     * {@inheritDoc}
     */
    public function getTipoCliente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipoCliente', []);

        return parent::getTipoCliente();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipoCliente($tipoCliente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipoCliente', [$tipoCliente]);

        return parent::setTipoCliente($tipoCliente);
    }

    /**
     * {@inheritDoc}
     */
    public function getOid()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getOid();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOid', []);

        return parent::getOid();
    }

    /**
     * {@inheritDoc}
     */
    public function setOid($oid)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOid', [$oid]);

        return parent::setOid($oid);
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVersion', []);

        return parent::getVersion();
    }

    /**
     * {@inheritDoc}
     */
    public function setVersion($version)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVersion', [$version]);

        return parent::setVersion($version);
    }

    /**
     * {@inheritDoc}
     */
    public function getEncrypted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEncrypted', []);

        return parent::getEncrypted();
    }

    /**
     * {@inheritDoc}
     */
    public function setEncrypted($encrypted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEncrypted', [$encrypted]);

        return parent::setEncrypted($encrypted);
    }

    /**
     * {@inheritDoc}
     */
    public function encrypt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encrypt', []);

        return parent::encrypt();
    }

    /**
     * {@inheritDoc}
     */
    public function decrypt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'decrypt', []);

        return parent::decrypt();
    }

    /**
     * {@inheritDoc}
     */
    public function getManagedEntities()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getManagedEntities', []);

        return parent::getManagedEntities();
    }

}
