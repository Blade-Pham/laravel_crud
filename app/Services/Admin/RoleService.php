<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 10:20
 */

namespace App\Services\Admin;

use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoleService
{
    private $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function store($data)
    {
        $dataStore = [
          'name'=>$data['name'],
        ];
        return $this->roleRepository->store($dataStore);
    }

    public function findById($id)
    {
        return $this->roleRepository->findById($id);
    }

    public function update($data, $id)
    {
        $dataUpdate = [

            'name' => $data['name'],

        ];
        return $this->roleRepository->update($dataUpdate, $id); // true or false
    }

    public function getAll()
    {
        return $this->roleRepository->getList(request()->all());
    }

    public function delete($id)
    {
        return $this->roleRepository->delete($id); // return true or false
    }
}
