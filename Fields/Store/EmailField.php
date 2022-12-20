<?php

namespace RestapiLaravel\Fields\Store;

class EmailField extends Field{

	protected $defaultRules = 'email';

	public function fill($object, $data){

		$object->{$this->getName()} = $data[$this->getName()];
	}
}
