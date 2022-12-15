<?php

namespace RestapiLaravel\Controllers;

use RestapiLaravel\Services\ResourceService;
use Illuminate\Support\Str;

class ResourceController extends AbstractController
{   
    public function __construct(){

        if(request()->route()){
            $resourceName = request()->route()->parameters['resource'];
            $resourceName = Str::singular($resourceName); 
            $resourceName = Str::studly($resourceName); 

            if(class_exists("App\\Resources\\$resourceName")){
                $resource = new ("App\\Resources\\$resourceName");

                $this->service = new ResourceService(
                    $resource->model,
                    $resource->getFields()
                );
            }else{
                $this->errorResource = true;
            }
        }
    }

}