<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addproduct(Request $request)
    {

        $product = new Product();
        $product->name = $request->input("name");
        $product->model_no = $request->input("model");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->image = $request->file("file")->store("products");
        $product->save();
        return $product;

    }


    public function lists()
    {

        $list = Product::all();
        return $list;
    }

    public function delete($id)
    {
        $result = Product::where("id", $id)->delete();
        return $result;
    }

    public function getData($id)
    {
        $result = Product::find($id);
        return $result;
    }

    public function update($id, Request $request)
    {

        $update = Product::find($id);
        $update->name = $request->input("name");
        $update->model_no = $request->input("model");
        $update->description = $request->input("description");
        $update->price = $request->input("price");
        if ($request->file('file')) {
            $update->image = $request->file("file")->store("products");

        }
        $update->save();
    }


    public function search($key){
       return Product::where("name","LIKE","%".$key."%")->get();
    }
}
