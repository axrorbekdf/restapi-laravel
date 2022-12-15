<?php 

namespace App\Resources;

use App\Models\User as ModelsUser;
use RestapiLaravel\Fields\Store\TextField;

class User{

	public $model = ModelsUser::class;

	public function getFields(){
		return [
            // TextField::make('name')
            // 	->setRules('required')
            // 	->setMessage('required','Toldirilishi shart')
        ];
	}

}