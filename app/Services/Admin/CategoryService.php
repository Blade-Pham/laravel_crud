<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 10:20
 */

namespace App\Services\Admin;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store($data)
    {
        $dataStore = [
          'name'=>$data['name'],
        ];
        return $this->categoryRepository->store($dataStore);
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function update($data, $id)
    {
        $dataUpdate = [
          
            'name' => $data['name'],
           
        ];
        return $this->categoryRepository->update($dataUpdate, $id); // true or false
    }

    public function getAll()
    {
        return $this->categoryRepository->getList(request()->all());
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id); // return true or false
    }
}
