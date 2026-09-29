<?php 
namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepoInterfaces;

class CategoryRepository implements CategoryRepoInterfaces{
    public function getAll(){
        return Category::all();
    }

    public function getById(string $id){
        return Category::findOrFail($id);
    }

    public function create(array$data){
        return Category::create($data);
    }

    public function update(string $id, array $data){
        $kat = $this->getById($id);
        $kat->update($data);
        return $kat;
    }

    public function delete(string $id){
        $kat = $this->getById($id);
        return $kat->delete();
    }
}