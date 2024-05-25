<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 23/05/2024
 * Time: 18:57
 */

namespace App\Repositories\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminRepositoryInterface
{

    private $adminModel;

    public function __construct(Admin $adminModel)
    {
        $this->adminModel = $adminModel;
    }

    public function store($data)
    {
        return $this->adminModel->insert([
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'created_at' => now(),
            ]
        ]);
    }

    public function update($data, $id)
    {
        return $this->adminModel->where('id', $id)->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function delete($id)
    {
        return $this->adminModel->where('id', $id)->delete();
    }

    public function get($id)
    {
        return $this->adminModel->where('id', $id)->first();
    }

    public function all()
    {
        return $this->adminModel->get();
    }
}
