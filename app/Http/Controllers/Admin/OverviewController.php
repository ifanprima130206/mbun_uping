<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Ikhtisar',
        ];

        return view('admin.overview', $data);
    }
}
