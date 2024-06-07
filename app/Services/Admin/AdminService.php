<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 23/05/2024
 * Time: 19:21
 */

namespace App\Services\Admin;

use App\Repositories\Admin\AdminRepositoryInterface;

class AdminService
{
    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository){
        $this->adminRepository = $adminRepository;
    }


    public function store($data) // data from request in controller
    {

        $this->adminRepository->store($data);
    }
    public function getAll()
    {
        return $this->adminRepository->all();
    }
}
