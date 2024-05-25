<?php
/**
 * Created by PhpStorm
 * User: Kha Nam (Andrew Nguyen)
 * Date: 23/05/2024
 * Time: 18:57
 */

namespace App\Repositories\Admin;

interface AdminRepositoryInterface
{
    public function store($data);

    public function update($data, $id);

    public function delete($id);

    public function get($id);

    public function all();
}
