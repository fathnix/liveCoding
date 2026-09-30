<?php
namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepoInterfaces;
use Illuminate\Support\Facades\Cache;

class CategoryService{
    protected CategoryRepoInterfaces $category_repo;
    protected $keyCache = 'all_kat';

    public function __construct(CategoryRepoInterfaces $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    public function getAllKat(){
        $Cache = Cache::remember($this->keyCache, 120, function (){
            return $this->category_repo->getAll()->toArray();
        });
        
        return Category::hydrate($Cache);
    }

    public function storeKat(array $data){
        Cache::forget($this->keyCache);
        return $this->category_repo->create($data);
    }

    public function putKat(string $id, array $data){
        Cache::forget($this->keyCache);
        return $this->category_repo->update($id, $data);
    }

    public function destroyKat(string $id){
        Cache::forget($this->keyCache);
        return $this->category_repo->delete($id);
    }
}