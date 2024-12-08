<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table("cart_items")->get();
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = $request->all();
        DB::table("cart_items")->insert([
            "cart_id" => $form["cart_id"],
            "product_id" => $form["product_id"],
            "quantity" => $form["quantity"],
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table("cart_items")->get();
        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $form = $request->all();
        DB::table("cart_items")
            ->where("id", $id)
            ->update(["quantity" => $form["quantity"], "updated_at" => now()]);
        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
