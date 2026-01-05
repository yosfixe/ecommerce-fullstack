<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->session()->has('login')) {
            return redirect()->route('user.index');
        }
        $cart = $request->session()->get('cart', array());
        $cats = Category::all();
        $prods = Product::all();

        return view("products.index", compact('cats', 'prods', 'cart'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::all();
        return view("products.form")->with(["cats"=>$cats]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prod=new Product;
        $prod->name=$request->input('name');
        $prod->price = $request->input('price');
        $prod->description =$request->input('description');
        $prod->production_date =$request->input('production_date');
        $prod->type=$request->input('type');
        $request->validate(['picture'=>'required|image|mimes:png,gif,jpeg,jpg | max:500000']);
        $pictureName=uniqid().'.'.$request->picture->extension();
        $request->picture->move(public_path('pictures') , $pictureName);
        $prod->picture=$pictureName;
        $prod->cat_id=$request->input("category");
        $prod->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (session('login')){
            $prod = Product::find($id);
            return view("products.show")->with(["prod"=>$prod]);
        } else abort(403, "You Must Log in");
    }

    public function delete(string $id)
    {
        $prod = Product::find($id);
        $prod->delete();
        return redirect()->route("products.index");
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!session('login') || session('priv') !=="A") return redirect()->route("user.logout");
        else {
            $cats = Category::all();
            $prod = Product::find($id);
            return view("products.edit")->with(["prod"=>$prod, "cats"=>$cats]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if (!session('login') || session('priv') !=="A") return redirect()->route("user.logout");
        else {
            $id = $request->input('id');
            $prod = Product::find($id);
            $prod->name = $request->input("name");
            $prod->description = $request->input("description");
            $prod->production_date = $request->input("date");
            $prod->type = $request->input("type");
            $prod->picture = $request->input("picture");
            $prod->cat_id = $request->input("category");
            $prod->save();
            return redirect()->route("products.index");
        }
    }

    public function search(Request $request)
    {
        $criterea = $request->input('criterea');
        $prods = Product::where('name', '%'.$criterea.'%')->orwhere('description', '%'.$criterea.'%')->get();
        return view("products.index")->with(["prods"=>$prods]);
    }

    public function PdfCreate() 
    {
        $prods = Product::all();
        $pdf = Pdf::loadView('products.pdf', ['prods' => $prods]);

        return $pdf->download('invoice.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //
    }
}
