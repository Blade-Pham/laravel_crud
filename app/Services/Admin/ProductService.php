<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 10:20
 */

namespace App\Services\Admin;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function store($data)
    {
        $dataStore = [
            'code' => $data['code'],
            'slug' => Str::slug($data['name']),
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => $data['type'],
            'category'=>$data['category'],
            'description' => $data['description'],
            'created_at' => now(),
            'updated_at' => now(),
            'admin_id' => "2"
        ];
        return $this->productRepository->store($dataStore);
    }

    public function findById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function update($data, $id)
    {
        $dataUpdate = [
            'code' => $data['code'],
            'slug' => Str::slug($data['name']),
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => $data['type'],
            'description' => $data['description'],
            'updated_at' => now(),
        ];
        return $this->productRepository->update($dataUpdate, $id); // true or false
    }

    public function getAll()
    {
        return $this->productRepository->getList(request()->all());
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id); // return true or false
    }
}
