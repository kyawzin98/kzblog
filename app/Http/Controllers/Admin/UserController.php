<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use App\Model\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = Admin::all();
        return view('admin.user.users_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('users.create')){
            $data['roles'] = Role::all();
            return view('admin.user.create_user', $data);
        }
        return redirect(route('admin.home'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:191|unique:admins',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',

        ]);
        $request->status? : $request['status'] = 0;
        $request['password']=bcrypt($request->password);
        $user = Admin::create($request->except(['_token']));
        $user->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','New user is added Successfully');
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
        if (Auth::user()->can('users.create')) {
            $data['user'] = Admin::find($id);
            $data['roles'] = Role::all();
            return view('admin.user.edit_user', $data);
        }
        return redirect(route('admin.home'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:191',
            'phone' => 'required|numeric'
        ]);
        $request->status ? : $request['status'] = 0;
        $user=Admin::find($id);
        $user->update($request->except(['_token','_method']));
        $user->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','User is updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect()->back()->with('message','User is Deleted Successfully');
    }
}
