<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $products = Products::where('availability', 1)->get();
        return view('home', ['products' => $products]);
    }
}
