<?php
namespace App\Repositories\Role;
interface RoleRepositoryInterface{
    public function store($data);

    public function findById($id);

    public function update($data, $id);

    public function getList();

    public function delete($id);
}
