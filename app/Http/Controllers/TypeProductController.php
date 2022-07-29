<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Support\Facades\File;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeProducts = ProductType::all();
        return view('admin.typeProducts.index', ['typeProducts' => $typeProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typeProducts.add', ['action' => 'create']);
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
        ], [
            'name.required' => 'ban chua nhap name',
            'description.required' => 'ban chua nhap description',
        ]);

        $typeProduct = new ProductType();
        $typeProduct->name = $request->name;
        $typeProduct->image = $name;
        $typeProduct->description = $request->description;
        $typeProduct->save();
        return redirect()->route('typeProducts.index')->with('message', 'bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeProduct = ProductType::find($id);
        return view('admin.typeProducts.index', compact('typeProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeProduct = ProductType::findOrFail($id);
        return view('admin.typeProducts.add', ['action' => 'update'], compact(['typeProduct']));
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
        ], [
            'name.required' => 'ban chua nhap name',
            'description.required' => 'ban chua nhap description',
        ]);

        $typeProduct = ProductType::find($id);
        $typeProduct->name = $request->name;
        $typeProduct->image = $name;
        $typeProduct->description = $request->description;
        $typeProduct->save();
        return redirect()->route('typeProducts.index')->with('message', 'bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $typeProduct = ProductType::find($id);
        $imgLink = public_path('/source/image/product\\') . $typeProduct->image;
        if (File::exists($imgLink)) {
            File::delete($imgLink);
        }
        $typeProduct->delete();
        return redirect()->route('typeProducts.index')->with('thành công', 'bạn đã xóa thành công');
    }
}
