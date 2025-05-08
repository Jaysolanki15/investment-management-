<?php

namespace App\Http\Controllers;

use App\Models\Fd;
use App\Models\Stock;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function add_stock(Request $request)
    {
        // Validate the input data
        $request->validate([
            'stock_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
        ]);

        // Create a new stock record
        Stock::create([
            'user_id' => Auth::id(),
            'stock_name' => $request->stock_name,
            'ticker_symbol' => $request->ticker_symbol,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'current_value' => $request->current_value,
            'purchase_date' => $request->purchase_date,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Stock added successfully.');
    }


    public function add_fd(Request $request)
    {
        // Validate the input data
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'maturity_date' => 'required|date|after:start_date',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
        ]);

        // Create a new Fixed Deposit record
        Fd::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'interest_rate' => $request->interest_rate,
            'start_date' => $request->start_date,
            'maturity_date' => $request->maturity_date,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Fixed Deposit added successfully.');
    }

    public function add_property(Request $request)
    {
        // Validate the input data
        $request->validate([
            'property_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'value' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
            'property_type' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        // Create a new Property record
        Property::create([
            'user_id' => Auth::id(),
            'property_name' => $request->property_name,
            'location' => $request->location,
            'value' => $request->value,
            'purchase_date' => $request->purchase_date,
            'property_type' => $request->property_type,
            'description' => $request->description,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Property added successfully.');
    }


    public function totalvalue(){
        $totalvalueStock = \App\Models\Stock::sum(\DB::raw('quantity * purchase_price'));
        $totalvalueFds = \App\Models\Fd::sum('amount');
        $totalvalueProperties = \App\Models\Property::sum('value');
        $totalInvestment = $totalvalueStock + $totalvalueFds + $totalvalueProperties;
    
        return view('dashboard', compact(
            'totalInvestment',
            'totalvalueStock',
            'totalvalueFds',
            'totalvalueProperties'
        ));
    }

}
