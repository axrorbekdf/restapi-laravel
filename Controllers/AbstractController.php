<?php

namespace RestapiLaravel\Controllers;

use App\Http\Controllers\Controller;

class AbstractController extends Controller {

    protected $service;
    protected $errorResource = false;

	public function index()
    {   
        if($this->errorResource){
            return response()->json([
                'item' => null,
                'resource' => "Not Found"
            ]);  
        }

        $items = $this->service->index();
        return response()->json(['items' => $items]); 
    }

    public function store()
    {   
        if($this->errorResource){
            return response()->json([
                'item' => null,
                'resource' => "Not Found"
            ]);  
        }
        
        $item = $this->service->store(request()->all());
        return response()->json(['item' => $item], 201);
    }

    
    public function show($id)
    {   
        if($this->errorResource){
            return response()->json([
                'item' => null,
                'resource' => "Not Found"
            ]);  
        }

        $item = $this->service->show(request()->id);
        return response()->json(['item' => $item]);
    }

    
    public function update($id)
    {
        if($this->errorResource){
            return response()->json([
                'item' => null,
                'resource' => "Not Found"
            ]);  
        }

        $item = $this->service->update(request()->id, request()->all());
        return response()->json(['item' => $item]);
    }

    
    public function destroy($id)
    {
        if($this->errorResource){
            return response()->json([
                'item' => null,
                'resource' => "Not Found"
            ]);  
        }

        $item = $this->service->destroy(request()->id);
        return response()->json(['item' => $item]);
    }
}