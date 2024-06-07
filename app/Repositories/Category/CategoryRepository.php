<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 10:21
 */

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function store($data)
    {
        return $this->categoryModel->insertGetId($data);

    }

    public function findById($id)
    {
        return $this->categoryModel->where('id', $id)->first();
    }

    public function update($data, $id)
    {
        return $this->categoryModel->where('id', $id)->update($data);
    }

    public function getList()
    {
        return $this->categoryModel->get();
    }

    public function delete($id)
    {
        return $this->categoryModel->where('id', $id)->delete();
    }
}
