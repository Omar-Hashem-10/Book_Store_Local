<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::orderBy('id', 'DESC')->paginate();
        return view('dashboard.discount.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscountRequest $request)
    {
        Discount::create($request->validated());
        return redirect()->route('dashboard.discount.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        return view('dashboard.discount.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        return view('dashboard.discount.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());

        return redirect()->route('dashboard.discount.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('dashboard.discount.index');
    }

    public function checkCode(Request $request)
    {
        $discount = Discount::where('code', $request->code)->count();
        return response()->json(['data' => ['is_exist' => $discount]]);
    }

    public function search(Request $request)
    {
        $discounts = Discount::whereLike('code', "%$request->q%")->orWhereLike('percentage', "%$request->q%")->limit(5)->get();
        return response()->json(['data' => ['discounts' => $discounts]]);
    }
}
