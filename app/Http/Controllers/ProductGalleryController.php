<?php

namespace App\Http\Controllers;
use App\Models\ProductGallery;
use App\Models\Product;
use App\Http\Requests\ProductGalleryRequest;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $galleries = ProductGallery::with('product')->get();
        return view('pages.product-gallery.index',with([
            'galleries' => $galleries
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.product-gallery.create')->with([
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/products','public');
        ProductGallery::create($data);
        session()->flash('success','Photo berhasil di upload');
        return redirect()->route('gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();
        session()->flash('success','Data berhasil di hapus');
        return redirect()->route('gallery');
    }
}
