<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;


class ProductController extends Controller
{
    public function index()
    {
        $allProduct = Product::paginate(10);
        foreach ($allProduct as $product) {
            $product->discountPercentage = $product->price + ($product->price * ($product->discountPercentage/100));
        }
        return view('home', ['products' => $allProduct]);
    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        $product->images = preg_replace('/[^A-Za-z0-9\-\:\/\,\.\*\& ]/', '', $product->images);
        $product->images = explode (",",$product->images);

        return view('detail', ['product' => $product]);
    }

    public function update($id)
    {
        $product = Product::where('id', $id)->first();
        $product->images = preg_replace('/[^A-Za-z0-9\-\:\/\,\.\*\& ]/', '', $product->images);
        $product->images = explode (",",$product->images);

        return view('update', ['product' => $product]);
    }

    public function updateSave(Request $request)
    {
        
        DB::beginTransaction();
        // dd($request);
        try {
            $updateProduct = Product::productUpdate($request->id, $request->title, $request->description, $request->price, $request->discountPercentage, $request->stock, $request->brand, $request->category);
            if ($updateProduct) {
                DB::commit();
                return redirect('/')
                    ->with('success', 'Data Member Berhasil Diubah');
            } else {
                return redirect()
                    ->back()
                    ->with('error', 'Data Member Gagal Diubah');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            if (env('APP_ENV') == 'Local') {
                throw $th;
            } else {
                return redirect()->back()->with('error', 'Silahkan Cek Kembali Data Anda');
            }
        }
    }
}
