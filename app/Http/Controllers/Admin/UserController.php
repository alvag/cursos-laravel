<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'can:Leer usuarios' )->only( 'index' );
        $this->middleware( 'can:Editar usuarios' )->only( 'edit', 'update' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        return view( 'admin.users.index' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View|Response
     */
    public function edit( User $user )
    {
        $roles = Role::all();
        return view( 'admin.users.edit', compact( 'user', 'roles' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update( Request $request, User $user )
    {
        $user->roles()->sync( $request->roles );
        return redirect()->route( 'admin.users.edit', $user );
    }
}
