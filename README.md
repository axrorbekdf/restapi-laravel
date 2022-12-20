# Laravel uchun oddiy REST API package

Yuklab olish
```
composer require ahrorbekdf/restapi-laravel
```

Publishing
```
php artisan vendor:publish --tag=started-resources --force
```

Ishlatish! Har bir model uchun App\Model\User modelini resource kabi Resources yaratiladi.
```php

<?php 

namespace App\Resources;

use App\Models\User as ModelsUser;
use RestapiLaravel\Fields\Store\TextField;
use RestapiLaravel\Fields\Store\EmailField;
use RestapiLaravel\Fields\Store\PasswordField;

class User{

    public $model = ModelsUser::class;

    public function getFields(){
        return [
            TextField::make('name')
                ->setRules('required')
                ->setMessage('required','Toldirilishi shart'),
            
            EmailField::make('email')
                ->setRules('required')
                ->setMessage('required','Toldirilishi shart'),

            PasswordField::make('password')
                ->setRules('required')
                ->setMessage('required','Toldirilishi shart')
        ];
    }

}
```

Request
```
GET: http://127.0.0.1:8000/api/users
```
Response
```php

{
    "items": [
        {
            "name": "Name",
            "email": "name@gmail.com",
            "created_at": "2022-00-00T10:58:03.000000Z",
            "updated_at": "2022-00-00T10:58:03.000000Z",
            "id": 1,
        }
    ]
}
```