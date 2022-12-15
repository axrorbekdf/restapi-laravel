<?php 

namespace RestapiLaravel\Resources;

use RestapiLaravel\Models\Product as ModelsProduct;
use RestapiLaravel\Fields\Store\TextField;
use RestapiLaravel\Fields\Store\MoneyField;

class Product{

	public $model = ModelsProduct::class;

	public function getFields(){
		return [
            TextField::make('name')
            	->setRules('required')
            	->setMessage('required','Toldirilishi shart'),

            MoneyField::make('price')
            	->setRules('required|numeric')
            	->setMessage('required','Toldirilishi shart')
            	->setMessage('numeric','Raqam kiriting'),
        ];
	}

}