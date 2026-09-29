<?php
namespace App\Services;

use App\Repositories\Contracts\CategoryRepoInterfaces;

class CategoryService{
    protected CategoryRepoInterfaces $category_repo;

    public function __construct(CategoryRepoInterfaces $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    public function getAllKat(){
        return $this->category_repo->getAll();
    }

    public function storeKat(array $data){
        return $this->category_repo->create($data);
    }

    public function putKat(string $id, array $data){
        return $this->category_repo->update($id, $data);
    }

    public function destroyKat(string $id){
        return $this->category_repo->delete($id);
    }
}