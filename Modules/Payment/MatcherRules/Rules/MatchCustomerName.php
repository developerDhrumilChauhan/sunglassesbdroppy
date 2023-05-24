<?php
namespace Plenty\Modules\Payment\MatcherRules\Rules;

use Plenty\Modules\Account\Address\Models\AddressRelationType;
use Plenty\Modules\Order\Models\Order;
use Plenty\Modules\Payment\Models\Payment;

/**
 * Customer Name Payment Matcher Rule
 */
abstract class MatchCustomerName 
{

	abstract public function canScore(
		Payment $payment, 
		int $matchScore, 
		array $scoringLog
	):bool;

	abstract public function score(
		Payment $payment, 
		Order $order
	):float;

	abstract public function getScoreUp(
	):int;

	abstract public function setScoreUp(
		int $scoreUp
	);

	abstract public function getScoreDown(
	);

	abstract public function setScoreDown(
		 $scoreDown
	);

	/**
	 * calculate the matching condition used in 2 rules - amount and email
	 */
	abstract public function calculateMatchingCondition(
		Payment $payment
	):int;

}