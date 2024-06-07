<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use App\Services\Admin\AdminService;
use App\Services\Admin\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\Store;
use Modules\Admin\Http\Requests\StoreProductRequest;


class ProductController extends Controller
{

    private $productService;
    private $adminService;
    private $categoryService;

    public function __construct(ProductService $productService, AdminService $adminService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->adminService = $adminService;
        $this->categoryService=$categoryService;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productService->getAll();
        $admin = $this->adminService->getAll();
        $category=$this->categoryService->getAll();
        return view('admin::pages.product.index', compact('products','admin','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=$this->categoryService->getAll();
        return view('admin::pages.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $productId = $this->productService->store($request->all());

        //  Sau khi tao xong, thi se tro ve trang edit
        return  redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = $this->productService->findById($id);
        return view('admin::pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, $id): RedirectResponse
    {
        $statusUpdate = $this->productService->update( $request->all(), $id);
        if ($statusUpdate) {
            return redirect()->route('admin.product.index');
        } else {
            dd("Update Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $statusDelete = $this->productService->delete($id);
        if ($statusDelete){
            return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully');
        } else {
            dd("Delete Failed");
        }
    }
}
