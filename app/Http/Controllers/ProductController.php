<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.add', ['action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = '';
        if ($request->hasfile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png,gif|max:4000|required',
            ], [
                'image.mimes' => 'chi chap nhan file hinh anh',
                'image.max' => 'chi chap nhan file hinh anh duoi 2MB',
            ]);
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/source/image/product/');
            $file->move($destinationPath, $name);
        }
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required|integer',
            'promotion_price' => 'required|integer',
            'unit' => 'required',
        ], [
            'name.required' => 'ban chua nhap name',
            'description.required' => 'ban chua nhap description',
            'unit_price.required' => 'ban chua nhap unit_price',
            'promotion_price.required' => 'ban chua nhap promotion_price',
            'unit_price.integer' => 'unit_price phải là số',
            'promotion_price.integer' => 'promotion_price phải là số',
            'unit.required' => 'ban chua nhap unit',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->image = $name;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->description = $request->description;
        $product->id_type = $request->id_type;
        $product->save();
        return redirect()->route('products.index')->with('message', 'bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.index', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.add', ['action' => 'update'], compact(['product']));
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
        $name = '';
        if ($request->hasfile('image')) {
            $this->validate($request, [
                'image' => 'mimes:jpg,png,gif,jpeg|max:4000|required',
            ], [
                'image.mimes' => 'chi chap nhan file hinh anh',
                'image.max' => 'chi chap nhan file hinh anh duoi 2MB',
            ]);
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('/source/image/product/');
            $file->move($destinationPath, $name);
        }
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required|integer',
            'promotion_price' => 'required|integer',
            'unit' => 'required',
        ], [
            'name.required' => 'ban chua nhap name',
            'description.required' => 'ban chua nhap description',
            'unit_price.required' => 'ban chua nhap unit_price',
            'promotion_price.required' => 'ban chua nhap promotion_price',
            'unit_price.integer' => 'unit_price phải là số',
            'promotion_price.integer' => 'promotion_price phải là số',
            'unit.required' => 'ban chua nhap unit',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->image = $name;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('products.index')->with('message', 'bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $imgLink = public_path('/source/image/product\\') . $product->image;
        if (File::exists($imgLink)) {
            File::delete($imgLink);
        }
        $product->delete();
        return redirect()->route('products.index')->with('thành công', 'bạn đã xóa thành công');
    }
}
