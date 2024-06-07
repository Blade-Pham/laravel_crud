<?php


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

    public function getList($dataSearch)
    {
        $data= $this->productModel->with(['createBy']);
        if(!empty($dataSearch['name'])){
            $data=$data->where('name', 'like', '%'.$dataSearch['name'].'%');
        }
        if(!empty($dataSearch['code'])){
            $data=$data->where('code', $dataSearch['code']);
        }if(!empty($dataSearch['admin_id'])){
            $data=$data->where('admin_id', $dataSearch['admin_id']);
        }if(!empty($dataSearch['category_name'])){
            $data=$data->where('category', $dataSearch['category_name']);}

        return $data->get();
    }

    public function delete($id)
    {
        return $this->productModel->where('id', $id)->delete();
    }
}
