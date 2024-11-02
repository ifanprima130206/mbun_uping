<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Admin\Master\Products\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $data = [
            'title' => 'Produk',
            'products' => Product::latest()->get(),
        ];

        return view('admin.master.product.index', $data);
    }
}
