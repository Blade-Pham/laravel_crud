<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 25/05/2024
 * Time: 10:21
 */

namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function store($data);

    public function findById($id);

    public function update($data, $id);

    public function getList();

    public function delete($id);
}
