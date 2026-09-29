<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\PutProduct;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{
    protected ProductService $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $result = $this->product_service->getAllProduct();
            return ProductResource::collection($result);

        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduct $request)
    {
        try{
            $validator  = $request->validated();
            $result = $this->product_service->storeProduct($validator);
            return new ProductResource($result);

        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $result = $this->product_service->getIdProduct($id);
            return new ProductResource($result);

        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutProduct $request, string $id)
    {
        try{
            $validator = $request->validated();
            $result = $this->product_service->putProduct($id, $validator);
            return new ProductResource($result);

        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->product_service->deleteProduct($id);
            return response()->json([
                'message' => 'data berhasil di hapus'
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
