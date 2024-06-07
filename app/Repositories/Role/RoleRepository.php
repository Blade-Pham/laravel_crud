<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 10:21
 */

namespace App\Repositories\Role;

use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

    private $roleModel;

    public function __construct(Role $roleModel)
    {
        $this->roleModel = $roleModel;
    }

    public function store($data)
    {
        return $this->roleModel->insertGetId($data);

    }

    public function findById($id)
    {
        return $this->roleModel->where('id', $id)->first();
    }

    public function update($data, $id)
    {
        return $this->roleModel->where('id', $id)->update($data);
    }

    public function getList()
    {
        return $this->roleModel->get();
    }

    public function delete($id)
    {
        return $this->roleModel->where('id', $id)->delete();
    }
}
