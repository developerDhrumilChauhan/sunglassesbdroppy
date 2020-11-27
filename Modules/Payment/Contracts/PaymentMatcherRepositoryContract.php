<?php
namespace Plenty\Modules\Payment\Contracts;

use Plenty\Modules\Payment\Models\Payment;

/**
 * The PaymentMatcherRepositoryContract automatically matching payments to an order.
 */
interface PaymentMatcherRepositoryContract 
{

	/**
	 * Checks and assigns payment data.
	 */
	public function checkMapFindAssignPayment(
		int $mopId, 
		 $data
	):string;

	/**
	 * Finds and assigns payment data
	 */
	public function findAssignPayment(
		Payment $payment
	);

	/**
	 * Gets the matching of payment data with orders.
	 */
	public function getMatchingRatesForPayment(
		int $paymentId
	):array;

}