<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['permissions'] = Permission::all();
        return view('admin.permission.permissions_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create_permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:permissions',
            'permission_for' => 'required'
        ]);

        $data = $request->except(['_token']);
        Permission::create($data);
        return redirect(route('permission.index'))->with('message', 'New Permission Added Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['permission'] = Permission::find($id);
        return view('admin.permission.edit_permission', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:permissions',
            'permission_for' => 'required'

        ]);

        $data = $request->except(['_token']);
        $permission = Permission::find($id);
        $permission->update($data);
        return redirect(route('permission.index'))->with('message', 'Permission Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Permission::destroy($id);
        return redirect()->back()->with('message', 'Permission Deleted Sucessfully');
    }
}
