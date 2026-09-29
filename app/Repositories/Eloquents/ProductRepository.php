<?php
namespace App\Repositories\Eloquents;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepoInterfaces;

class ProductRepository implements ProductRepoInterfaces{
    protected Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    
    public function getAll(){
        return $this->model->with('category')->get();
    }

    public function getById(string $id){
        return $this->model->with('category')->find($id);
    }

    public function create(array$data){
        $Product = $this->model->create($data);
        return $Product->load('category');
    }

    public function update(string $id, array $data){
        $kat = $this->getById($id);
        $kat->update($data);
        return $kat->fresh('category');
    }

    public function delete(string $id){
        $kat = $this->getById($id);
        return $kat->delete();
    }
}