<?php

namespace RestapiLaravel\Fields\Store;

class PasswordField extends Field{

	protected $defaultRules = 'password';

	public function fill($object, $data){

		$object->{$this->getName()} = bcrypt($data[$this->getName()]);
		
	}
}
