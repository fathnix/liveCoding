<?php
namespace App\Repositories\Contracts;

interface CategoryRepoInterfaces{
    public function getAll();
    public function getById(string $id);
    public function create(array$data);
    public function update(string $id, array $data);
    public function delete(string $id);
}