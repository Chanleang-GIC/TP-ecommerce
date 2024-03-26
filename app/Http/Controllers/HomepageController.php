<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Http\Response;

class HomepageController extends Controller
{

    public function renderHome() {
        $products = Product::all();

        return view("homepage", compact('products'));
    }

}

