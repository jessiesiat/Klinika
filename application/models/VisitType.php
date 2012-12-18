<?php

class VisitType extends Elegant {
	
	public static $table = 'ref_visit_types';

	protected $rules = array(
			'visit_type' => 'required',
		);

}