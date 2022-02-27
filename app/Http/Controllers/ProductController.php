<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $products;

    public function index()
    {
        return view('product.add');
    }
    public function create(Request $request)
    {
        $this->product = new Product();
        $this->product->name = $request->name;
        $this->product->category = $request->category;
        $this->product->brand = $request->brand;
        $this->product->price = $request->price;
        $this->product->description = $request->description;

//        $image = $request->file('image');
//        $imageName = $image->getClientOriginalName();
//        $directory = 'product-images/';
//        $image->move($directory, $imageName);
////        $url = $directory.$imageName;
//        return asset('/product-images/image.jpj')

        $this->product->save();
        return redirect()->back()->with('message', 'Product info save successfully');
    }

    public function manage()
    {
        $this->products = Product::orderby('id', 'desc')->get();
        return view('product.manage-product', ['products' => $this->products]);
    }
    public function edit($id)
    {
        $this->product = Product::find($id);
//        return $this->student;

        return view('product.edit-product',['product' => $this->product]);
    }

    public function update(Request $request, $id)
    {
        $this->product = Product::find($id);
        $this->product->name = $request->name;
        $this->product->category = $request->category;
        $this->product->brand = $request->brand;
        $this->product->price = $request->price;
        $this->product->description = $request->description;
        $this->product->save();

        return redirect('/manage-product')->with('message', 'Product info update successfully');
    }

    public function delete($id)
    {
        $this->product = Product::find($id);
        $this->product->delete();
        return redirect('/manage-product')->with('message', 'Product info deleted successfully');
    }
}
