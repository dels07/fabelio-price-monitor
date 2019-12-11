<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\PriceHistory;
use App\Product;
use Facades\App\Http\Services\FabelioService as Fabelio;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);

        return view('index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $url = $request->url;
        $info = Fabelio::getProductInfo($url);

        $product = new Product;
        $product->fill($info);
        $product->save();

        $history = new PriceHistory;
        $history->product_id = $product->id;
        $history->price = $product->price;
        $history->save();

        return redirect('/add')->with('message', 'Successfuly add product link into system. <a href="/">See list</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $dates = [];
        $prices = [];

        foreach ($product->priceHistories as $history) {
            $dates[] = "'{$history->created_at->addHours(7)}'";
            $prices[] = (int) str_replace(['Rp ', ',', '.'], '', $history->price);
        }

        return view('detail')
            ->with('product', $product)
            ->with('dates', implode(',', $dates))
            ->with('prices', implode(',', $prices));
    }
}
