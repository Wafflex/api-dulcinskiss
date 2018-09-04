<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Status;
use App\Models\Materials;
use App\Classes\Validation;

class Products extends Model
{
    protected $table = 'products';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function categories(){
        return $this->BelongsTo(Categories::class,'categories_id');
    }

    public function status(){
        return $this->BelongsTo(Status::class,'status_id');
    }

     public function materials(){
        return $this->belongsToMany(Materials::class,'material_product','products_id','materials_id')
                    ->withPivot('quantity');
    }

    public function getProducts(){
        $products = Products::select('id','name','description','image')->get();
        //return Products::find(1)->materials;
        $available = true;
        foreach ($products as $product){
            $product->category = Products::find($product->id)->categories->description;

            $materials = Products::find($product->id)->materials;

            foreach ($materials as $material){
                $stock = $material->quantity;
                $required = $material->pivot->quantity;

                if ($stock < $required){
                    $available = false;
                }
            }

            if ($available){
                $product->status = "DISPONIBLE";
            }else{
                $product->status = "NO DISPONIBLE";
            }

            $data[] = $product;
        }

        return $data;
        /*
        $data = Products::
                    select('products.name','products.description as description','categories.description as category','status.description as status')
                    ->join('categories','products.categories_id','categories.id')
                    ->join('status','products.status_id','status.id')
                    ->get();
        return $data;*/
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
