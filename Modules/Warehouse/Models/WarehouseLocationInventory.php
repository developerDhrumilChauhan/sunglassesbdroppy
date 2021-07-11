<?php
namespace Plenty\Modules\Warehouse\Models;


/**
 * The warehouse location inventory model.
 */
abstract class WarehouseLocationInventory 
{

	const MAX_ITEMS_PER_PAGE = 100;

	const INVENTORY_STATUS_NOT_STARTED = 0;

	const INVENTORY_STATUS_STARTED = 1;

	const INVENTORY_STATUS_FINISHED = 2;

	const CREATED_AT = 'createdAt';

	const UPDATED_AT = 'updatedAt';
	
public		$id;
	
public		$user_id;
	
public		$status;
	
public		$warehouse_location;
	
public		$createdAt;
	
public		$updatedAt;
	
public		$warehouseLocation;
	
	/**
	 * Returns this model as an array.
	 */
	public function toArray(
	):array
	{
		return [];
	}

}