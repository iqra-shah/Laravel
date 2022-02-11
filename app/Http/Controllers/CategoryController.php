<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data=Category::all(); // select * from categories
       // $product=Product::all(); // select * from categories
       // dd($data);
       return View("Category.index")->with(['categories'=>$data]);
     //  return View("Category.index",compact('data','product'));
    }
    public function add()
    {
        return View("Category.add");
    }
    public function adddb(Request $req)
    {
        $category=new Category();
        $category->name=$req->name;
        $category->save();
        return redirect()->route("category");
    }
    public function delete(Request $req)
    {
        Category::destroy($req->cid);
        return redirect()->route("category");
    }
    public function update(Request $req)
    {
        $data=Category::find($req->cid); // select * from categories
        return View("Category.update")->with(['category'=>$data]);
    }
    public function updatedb(Request $req)
    {
        $category=Category::find($req->cid); 
        $category->name=$req->name;
        $category->save();
        return redirect()->route("category");
    }
}
