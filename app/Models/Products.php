<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Status;
use App\Classes\Validation;

class Products extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function categories(){
        return $this->hasOne(Categories::class,'categories_id');
    }

    public function status(){
        return $this->hasOne(Status::class,'status_id');
    }

    public function getProducts(){
        $data = Products::
                    select('products.name','products.description as description','categories.description as category','status.description as status')
                    ->join('categories','products.categories_id','categories.id')
                    ->join('status','products.status_id','status.id')
                    ->get();
        return $data;
    }

    public function storeProduct($request){
        $validation = new Validation();

        $validation = $validation->existence($request->name);

        if (!$validation){
            $product = new Products;
        
            $product->name = $request->name;
            $product->description = $request->description;
            $product->categories_id = $request->category;
            $product->status_id = 1;

            $product->save();

            return true;
        }
    }

    public function getProduct($id){
        $data = Products::
                    select('products.name','products.description as description','categories.description as category','status.description as status')
                    ->join('categories','products.categories_id','categories.id')
                    ->join('status','products.status_id','status.id')
                    ->where('products.id','=',$id)
                    ->get();
        return $data;
    }
}
