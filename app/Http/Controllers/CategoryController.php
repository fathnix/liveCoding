<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\PutCategory;
use App\Http\Requests\Category\StoreCategory;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Exception;

class CategoryController extends Controller
{
    protected CategoryService $category_service;

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $result = $this->category_service->getAllKat();
            return CategoryResource::collection($result);

        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategory $request)
    {
        try{
            $validator = $request->validated();
            $result = $this->category_service->storeKat($validator);
            return new CategoryResource($result);

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
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutCategory $request, string $id)
    {
        try{
            $validator = $request->validated();
            $result = $this->category_service->putKat($id, $validator);
            return new CategoryResource($result);

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
            $this->category_service->destroyKat($id);
            return response()->json([
                'message' => 'Data berhasil di hapus'
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
