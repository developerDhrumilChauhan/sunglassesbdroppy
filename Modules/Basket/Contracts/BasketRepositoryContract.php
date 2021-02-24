<?php
namespace Plenty\Modules\Basket\Contracts;

use Plenty\Modules\Basket\Models\Basket;

/**
 * The BasketRepositoryContract is the interface for the basket repository. This interface allows to get the shopping cart of the current customer session.
 */
interface BasketRepositoryContract 
{

	/**
	 * Gets the shopping cart from current customer session.
	 */
	public function load(
	):Basket;

	public function save(
		array $data
	);

	public function setCouponCode(
		string $couponCode
	):Basket;

	public function removeCouponCode(
	):Basket;

	/**
	 * Delete the basket for current session
	 */
	public function deleteBasket(
	):Basket;

}