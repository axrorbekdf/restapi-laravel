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
            "id": 1,
            "name": "Name",
            "email": "name@gmail.com",
            "email_verified_at": null,
            "two_factor_confirmed_at": null,
            "current_team_id": null,
            "profile_photo_path": null,
            "created_at": "2022-11-25T10:58:03.000000Z",
            "updated_at": "2022-11-25T10:58:03.000000Z",
            "profile_photo_url": "https://name.com/api/?name=A&color=7F9CF5&background=EBF4FF"
        }
    ]
}
```