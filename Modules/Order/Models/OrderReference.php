<?php
namespace Plenty\Modules\Order\Models;


/**
 * The order reference model. Each OrderReference has an origin order (the most top order) and a referenced order ('parent' or 'reorder').
 */
abstract class OrderReference 
{

	const REFERENCE_TYPE_PARENT = 'parent';

	const REFERENCE_TYPE_REORDER = 'reorder';

	const CREATED_AT = 'createdAt';

	const UPDATED_AT = 'updatedAt';
	
public		$id;
	
public		$orderId;
	
public		$originOrderId;
	
public		$referenceOrderId;
	
public		$referenceType;
	
public		$order;
	
public		$originOrder;
	
public		$referenceOrder;
	
	/**
	 * Returns this model as an array.
	 */
	public function toArray(
	):array
	{
		return [];
	}

}