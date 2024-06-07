<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Services\Admin\RoleService;


class RoleController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = $this->roleService->getAll();
        return view('admin::pages.role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin::pages.role.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $roleId = $this->roleService->store($request->all());

        //  Sau khi tao xong, thi se tro ve trang edit
        return  redirect()->route('admin.role.index')->with('success', 'Product created successfully');
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
        $role = $this->roleService->findById($id);
        return view('admin::pages.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $statusUpdate = $this->roleService->update( $request->all(), $id);
        if ($statusUpdate) {
            return redirect()->route('admin.role.index');
        } else {
            dd("Update Failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $statusDelete = $this->roleService->delete($id);
        if ($statusDelete){
            return redirect()->route('admin.role.index')->with('success', 'Product deleted successfully');
        } else {
            dd("Delete Failed");
        }
    }
}
