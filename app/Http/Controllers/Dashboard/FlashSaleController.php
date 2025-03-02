<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FlashSaleRequest;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flash_sales = FlashSale::filter(request()->all())->orderByDesc('id')->paginate();

        return view('dashboard.flash-sale.index', compact('flash_sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.flash-sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlashSaleRequest $request)
    {
        $flash_sale = FlashSale::create($request->except('_token'));

        $flash_sale->addMediaFromRequest('image')
                    ->toMediaCollection('image');

        return redirect()->route('dashboard.flash-sale.index')->with('success', 'Flash Sale Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlashSale $flashSale)
    {
        return view('dashboard.flash-sale.edit', compact('flashSale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FlashSaleRequest $request, FlashSale $flashSale)
    {
        $flashSale->update($request->validated());

        return redirect()->route('dashboard.flash-sale.index')->with('success', 'Flash Sale Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlashSale $flashSale)
    {
        $flashSale->delete();

        return redirect()->route('dashboard.flash-sale.index');
    }
}
