<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\Store;
use Modules\Admin\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{

    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin::pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::pages.product.create');
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
            return redirect()->back();
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
