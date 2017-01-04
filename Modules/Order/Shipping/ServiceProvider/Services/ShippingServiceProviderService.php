<?php
namespace Plenty\Modules\Order\Shipping\ServiceProvider\Services;

use Plenty\Modules\Order\Shipping\ServiceProvider\Exceptions\ShippingProviderRegisterException;
use Plenty\Modules\Order\Shipping\ServiceProvider\Services\Entries\ShippingServiceProviderEntry;

/**
 * The ShippingServiceProviderService class offers the possibility to register a shipping provider class and method that can be called by plentymarkets shipping controllers.
 */
abstract class ShippingServiceProviderService 
{

	abstract public function registerShippingProvider(
		string $shippingProviderCode, 
		array $shippingProviderNames, 
		string $shippingProviderClass
	):bool;

}