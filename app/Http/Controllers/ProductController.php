<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $model)
    {
        return view('product.index', ['products' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Product $model)
    {
//        return $request->all();
        $product = Product::where('variety',$request->variety)
            ->where('length',$request->length)
            ->where('stems',$request->stems)
            ->exists();

        if($product){
            return redirect()->route('product.index')->withStatus(__('Failed, product already exists!'));
        }else{
            $model->create($request->all());
            return redirect()->route('product.index')->withStatus(__('Product successfully created.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $prod = Product::where('variety',$request->variety)
            ->where('length',$request->length)
            ->where('stems',$request->stems)
            ->exists();

        if($prod){
            return redirect()->route('product.index')->withStatus(__('Nothing updated! A product with same values already exists'));
        }else{
            $product->update($request->all());
            return redirect()->route('product.index')->withStatus(__('Product successfully updated.'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->withStatus(__('Product successfully deleted.'));
    }
}
