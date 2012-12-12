<?php

class MedicineOut extends Elegant {
	
	public static $table = 'hc_medicine_out';

	public static $accessible = array('from_trans', 'from_trans_id', 'medicine_id', 'uom', 'qty');

}