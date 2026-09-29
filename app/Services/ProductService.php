<?php
namespace App\Services;

use App\Repositories\Contracts\ProductRepoInterfaces;
use Exception;

class ProductService {
    protected ProductRepoInterfaces $product_repo;

    public function __construct(ProductRepoInterfaces $product_repo)
    {
        $this->product_repo = $product_repo;
    }

    public function getAllProduct(){
        return $this->product_repo->getAll();
    }

    public function getIdProduct(string $id){
        $product = $this->product_repo->getById($id);

        if(!$product){
            throw new Exception('Product tidak di temukan');
        }
        return $product;
    }

    public function storeProduct(array $data){
        if(isset($data['quantity']) && ($data['quantity']) <1 ){
            throw new Exception('quantity tidak boleh kurang dari 1');
        }
        $product = $this->product_repo->create($data);
        return $product;
    }

    public function putProduct(string $id, array $data){

        if(isset($data['quantity']) && ($data['quantity']) <1 ){
            throw new Exception('quantity tidak boleh kurang dari 1');
        }

        $search = $this->product_repo->getById($id);
        if(!$search){
            throw new Exception('Data tidak ditemukan!');
        }

        $product = $this->product_repo->update($id, $data);
        return $product;
    }

    public function deleteProduct(string $id){
        $search = $this->product_repo->getById($id);
        if(!$search){
            throw new Exception('Product tidak ditemukan');
        }
        return $this->product_repo->delete($id);
    }
}