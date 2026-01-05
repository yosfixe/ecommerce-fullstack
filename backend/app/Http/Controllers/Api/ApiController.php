<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProdResource;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index()
    {
        return ['products'=>ProdResource::collection(Product::all())];
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'nullable|max:100',
        'production_date' => 'nullable|date',
        'type' => 'nullable|string',
        // 'picture' =>'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:512',
        'cat_id' => 'nullable|integer'
        ]);
        print_r($validated);
       
        // $file = $request->file('picture');
        // $fileInfo = [
        // 'original_name' => $file->getClientOriginalName(),
        // 'extension' => $file->getClientOriginalExtension(),
        // 'mime_type' => $file->getMimeType(),
        // 'size' => $file->getSize(),
        // 'is_valid' => $file->isValid() ];
        // $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // $picture = $file->storeAs('pictures', $fileName);
        // $validated['picture'] = $fileName ;
        // $file->store('pictures');

        // $file = $request->file('picture');

        // $fileInfo = [
        // 'original_name' => $file->getClientOriginalName(),
        // 'extension' => $file->getClientOriginalExtension(),
        // 'mime_type' => $file->getMimeType(),
        // 'size' => $file->getSize(),
        // 'is_valid' => $file->isValid() ];

        // $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // $path = $file->move(public_path('pictures'), $fileName);
        // $validated['picture'] = $fileName ;
        // $file->store('pictures');
        
       $data = Product::create($validated);  
       }

    public function show($id)
    {
        $product = Product::find($id);
        return ['product'=> ProdResource::make($product)];
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(null);
    }
}
