<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware( 'can:Listar role' )->only( 'index' );
        $this->middleware( 'can:Crear role' )->only( 'create', 'store' );
        $this->middleware( 'can:Editar role' )->only( 'edit', 'update' );
        $this->middleware( 'can:Eliminar role' )->only( 'destroy' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $roles = Role::all();

        return view( 'admin.roles.index', compact( 'roles' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view( 'admin.roles.create', compact( 'permissions' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store( Request $request ): RedirectResponse
    {
        $request->validate( [
            'name' => 'required',
            'permissions' => 'required'
        ] );

        $role = Role::create( [ 'name' => $request->name ] );

        $role->permissions()->attach( $request->permissions );

        return redirect()->route( 'admin.roles.index' )->with( 'info', 'El rol se creó satisfactoriamente' );
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View|Response
     */
    public function show( Role $role )
    {
        return view( 'admin.roles.show', compact( 'role' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View|Response
     */
    public function edit( Role $role )
    {
        $permissions = Permission::all();

        return view( 'admin.roles.edit', compact( 'role', 'permissions' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update( Request $request, Role $role ): RedirectResponse
    {
        $request->validate( [
            'name' => 'required',
            'permissions' => 'required'
        ] );

        $role->update( [
            'name' => $request->name
        ] );

        $role->permissions()->sync( $request->permissions );

        return redirect()->route( 'admin.roles.edit', $role );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy( Role $role ): RedirectResponse
    {
        $role->delete();
        return redirect()->route( 'admin.roles.index' )->with( 'info', 'El rol se eleminó con éxito' );
    }
}
