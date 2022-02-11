<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as MainTable;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Productimage;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public $table="Product";
    public $redirect="product";
    public function index()
    {
      //  $data=MainTable::all(); 
      $data=MainTable::join('brands','brands.id','products.brandid')
      ->join('categories','categories.id','products.categoryid')
      ->select('products.*','categories.name as categoryname','brands.name as brandname')
      ->get();
      //dd($data);
       return View($this->table.".index")->with([$this->redirect.'s'=>$data]);
    }
    public function add()
    {
        $categories=Category::all();
        $brands=Brand::all();
        return View($this->table.".add",compact('brands','categories'));
    }
    public function adddb(Request $req)
    {
        $brand=new MainTable();
        $brand->name=$req->name;
        $brand->price=$req->price;
        $brand->color=$req->color;
        $brand->categoryid=$req->categoryid;
        $brand->brandid=$req->brandid;
        $brand->size=$req->size;
        $brand->save();
    //     $this->validate($req, [
    //         'filenames' => 'required',
    //         'filenames.*' => 'image'
    // ]);

    $images = [];
    if($req->hasfile('images'))
     {
        foreach($req->file('images') as $image)
        {
            $extension = $image->getClientOriginalExtension();
            $imagename = 'product_'.time().rand(1,100).'.'.$extension;
            $image->move(public_path('productimage'), $imagename);  
            $images[] =[
                'name'=>$imagename,
                'productid'=>$brand->id
            ];  
        }
        productimage::insert($images);
     }


        
         return redirect()->route($this->redirect.".index");
    }
    public function delete(Request $req)
    {
        MainTable::destroy($req->cid);
        return redirect()->route($this->redirect.".index");
    }
    public function update(Request $req)
    {
        $categories=Category::all();
        $brands=Brand::all();
        $data=MainTable::find($req->cid); // select * from categories
        return View($this->table.".update",compact('brands','categories'))->with([$this->redirect=>$data]);
    }
    public function product()
    {
      $product=MainTable::where('products.id',$req->cid)
      ->join('brands','brands.id','products.brandid')
      ->join('categories','categories.id','products.categoryid')
      ->select('products.*','categories.name as categoryname','brands.name as brandname')
      ->get();
      $images=productimage::where('products.id',$req->cid->get());
       return View($this->table.".product",compact('product','images'));
    }
    public function updatedb(Request $req)
    {
        $brand=MainTable::find($req->cid);
        $brand->name=$req->name;
        $brand->price=$req->price;
        $brand->color=$req->color;
        $brand->categoryid=$req->categoryid;
        $brand->brandid=$req->brandid;
        $brand->size=$req->size;
        $brand->save();
        return redirect()->route($this->redirect.".index");
    }
}
