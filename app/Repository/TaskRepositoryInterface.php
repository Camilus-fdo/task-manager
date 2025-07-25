<?php
namespace App\Repository;

interface TaskRepositoryInterface
{
    public function all($filters, $perPage = 10);

    public function find($id);

    public function create($data);

    public function update($id, $data);
    
    public function delete($id);
}