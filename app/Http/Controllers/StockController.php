<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
{
    // Get stocks for the logged-in user
    $stocks = Auth::user()->stocks; // assuming User model has 'stocks' relationship
    // If not, use: $stocks = \App\Models\Stock::where('user_id', Auth::id())->get();

    return view('stock.index', compact('stocks'));
}

}
