<?php

namespace RestapiLaravel\Services;

use RestapiLaravel\Services\Interface\AbstractService;

class ResourceService extends AbstractService{

	protected $fields;

	public function __construct($model, $fields){
		$this->model = $model;
		$this->fields = $fields;
	}

	public function getFields(){
		return $this->fields;
	}
}