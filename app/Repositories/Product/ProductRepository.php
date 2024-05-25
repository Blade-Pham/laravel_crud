<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 10:21
 */

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function store($data)
    {
        return $this->productModel->insertGetId($data);

    }

    public function findById($id)
    {
        return $this->productModel->where('id', $id)->first();
    }

    public function update($data, $id)
    {
        return $this->productModel->where('id', $id)->update($data);
    }

    public function getList()
    {
        return $this->productModel->get();
    }

    public function delete($id)
    {
        return $this->productModel->where('id', $id)->delete();
    }
}
