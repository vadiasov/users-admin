<?php

namespace Vadiasov\UsersAdmin\Http;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active    = 'users';
        $user      = Auth::user();
        $users     = User::all();
        $userRoles = UserRole::all()->keyBy('user_id');
        $roles     = Role::all()->keyBy('id');
        
        return view('users-admin::admin.users.index', compact(
            'active',
            'user',
            'users',
            'userRoles',
            'roles'
        ));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'users';
        $user   = Auth::user();
        $roles  = Role::all()->keyBy('id');
        
        return view('users-admin::admin.users.create', compact(
            'active',
            'user',
            'roles'
        ));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     *
     * @param \Vadiasov\UsersAdmin\Http\UserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt(12345678),
        ]);
        
        $user->save();
        
        $userRole = new UserRole([
            'user_id' => $user->id,
            'role_id' => $request->role_id,
        ]);
        
        $userRole->save();
        
        return redirect(route('admin/users'))->with('status', 'New User has been created with standard password "12345678"!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
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
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active     = 'users';
        $user       = Auth::user();
        $roles      = Role::all()->keyBy('id');
        $userEdited = User::whereId($id)->first();
        $userRole   = UserRole::whereUserId($id)->first();
        
        return view('users-admin::admin.users.edit', compact(
            'active',
            'user',
            'roles',
            'userEdited',
            'userRole'
        ));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Vadiasov\UsersAdmin\Http\UserRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::whereId($id)->first();
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        $user->save();
    
        $userRole = UserRole::whereUserId($id)->first();
        $userRole->role_id = intval($request->role_id);
    
        $userRole->save();
    
        return redirect(route('admin/users'))->with('status', 'The User has been edited! Password is the same.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::whereId($id);
    
        // user_role row will be deleted automatically
        $user->delete();
        
        return redirect(route('admin/users'))->with('status', 'The User has been deleted!');
    }
    
    public function showUser()
    {
        return 'User from controller';
    }
}
