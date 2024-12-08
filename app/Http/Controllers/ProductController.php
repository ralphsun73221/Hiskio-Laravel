<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = $this->getData();
        $data = DB::table("products")->get();
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
    public function store(Request $request): mixed
    {
        $data = $this->getData();
        $newData = $request->all();
        $data->push(collect($newData));
        return response($data);
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
        $data = $this->getData();
        $selectedData = $data->where("id", $id)->first();
        $selectedData = $selectedData->merge(collect($form));
        return response($selectedData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->getData();
        $data = $data->filter(function ($product) use ($id) {
            return $product["id"] != $id;
        });
        return response($data->values());
    }

    /**
     * 取得資料
     *
     *
     */
    public function getData()
    {
        return collect([
            collect([
                "id" => 0,
                "title" => "商品一",
                "content" => "這是商品一",
                "price" => 100,
            ]),
            collect([
                "id" => 1,
                "title" => "商品二",
                "content" => "這是商品二",
                "price" => 122,
            ]),
        ]);
    }
}
