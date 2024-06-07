<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session\Store;
use Modules\Admin\Http\Requests\StoreCategoryRequest;
class CategoryController extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = $this->categoryService->getAll();
        return view('admin::pages.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin::pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $categoryId = $this->categoryService->store($request->all());

        //  Sau khi tao xong, thi se tro ve trang edit
        return  redirect()->route('admin.category.index')->with('success', 'Product created successfully');
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
        $category = $this->categoryService->findById($id);
        return view('admin::pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, $id): RedirectResponse
    {
        $statusUpdate = $this->categoryService->update( $request->all(), $id);
        if ($statusUpdate) {
            return redirect()->route('admin.category.index');
        } else {
            dd("Update Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $statusDelete = $this->categoryService->delete($id);
        if ($statusDelete){
            return redirect()->route('admin.category.index')->with('success', 'Product deleted successfully');
        } else {
            dd("Delete Failed");
        }
    }
}
