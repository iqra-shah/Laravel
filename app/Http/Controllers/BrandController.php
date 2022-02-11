<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data=Brand::all(); // select * from categories
       // $product=Product::all(); // select * from categories
       // dd($data);
       return View("Brand.index")->with(['brands'=>$data]);
     //  return View("Category.index",compact('data','product'));
    }
    public function add()
    {
        return View("Brand.add");
    }
    public function adddb(Request $req)
    {
        $brand=new Brand();
        $brand->name=$req->name;
        $brand->save();
        return redirect()->route("brand");
    }
    public function delete(Request $req)
    {
        Brand::destroy($req->cid);
        return redirect()->route("brand");
    }
    public function update(Request $req)
    {
        $data=Brand::find($req->cid); // select * from categories
        return View("Brand.update")->with(['brand'=>$data]);
    }
    public function updatedb(Request $req)
    {
        $brand=Brand::find($req->cid); 
        $brand->name=$req->name;
        $brand->save();
        return redirect()->route("brand");
    }
}
