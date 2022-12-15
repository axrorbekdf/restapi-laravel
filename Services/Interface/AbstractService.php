<?php

namespace RestapiLaravel\Services\Interface;

use Illuminate\Support\Facades\Validator;

class AbstractService {
	
	protected $model;

	public function index(){

		return $this->model::all();
	}

	public function show($id){
		
		return $this->model::findOrFail($id);
	}

	public function store(array $data){
		
		$fields = $this->getFields();
		$rules = [];
		$ruleMessage = [];

		foreach ($fields as $key => $field) {
			$rules[$field->getName()] = $field->getRules();
			$ruleMessage = array_merge($ruleMessage, $field->getMessage());
		}

		$validator = Validator::make($data, $rules, $ruleMessage);

		if($validator->fails()){

			return $validator->errors();
		}

		$data = $validator->validate();

		$object = new $this->model;
		foreach ($fields as $key => $field) {
			$field->fill($object, $data);
		}

		$object->save();

		return $object;

		// return $this->model::create($data);
	}

	public function update($id, array $data){
		
		$item = $this->show($id);
		$fields = $this->getFields();
		
		$rules = [];
		$ruleMessage = [];

		foreach ($fields as $key => $field) {
			$rules[$field->getName()] = $field->getRules();
			$ruleMessage = array_merge($ruleMessage, $field->getMessage());
		}

		$validator = Validator::make($data, $rules, $ruleMessage);

		if($validator->fails()){
			return $validator->errors();
		}

		$data = $validator->validate();

		foreach ($fields as $key => $field) {
			$field->fill($item, $data);
		}
		$item->update();
		
		return $item;

		// return $this->model::find($id)->update($data);
	}

	public function destroy($id){
		
		return $this->show($id)->delete();
	}

	public function getFields(){
		return [];
	}
}