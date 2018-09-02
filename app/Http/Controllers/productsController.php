<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Classes\Json;

class productsController extends Controller
{
    public function __construct(){
        $this->model = new Products();
        $this->json = new Json();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->model->getProducts();

        if (count($products) > 0){
            return $this->json->sendSuccess($products);
        }else{
            return $this->json->sendError('No hay nada que ofrecer',404);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->model->storeProduct($request);

        if ($product){
            return $this->json->sendSuccess($product,'Producto creado');
        }else{
            return $this->json->sendError('El producto ' . $request->name . ' ya existe',404);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->model->getProduct($id);

        if (count($product) > 0){
            return $this->json->sendSuccess($product,'Producto encontrado');
        }else{
            return $this->json->sendError('Ese producto no existe mmg',404);
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
