<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Models\Admin\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;


class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public $page_title;
    protected $module_details;
    protected $table_fields;
    protected $page_limit;
    protected $search_keyword;

    public function __construct(Request $request)
    {
        $this->page_limit = 10; //Default Limit Set
        $this->search_keyword = $request->keyword;
        $this->module_details = array(
            'page_title' => 'Roles',
            'button_title' => 'Role',
        );

        $this->table_fields = array(
            'id' => 'Id',
            'name' => 'Name',
            'guard_name' => 'Guard Nname',
            'created_at' => 'Added Date',
        );
    }
    public function index(Request $request)
    {
        // Define the Model
        $role = new Role();
        $data = [];
        $data['page'] = 1;
        $data['page_limit'] = $this->page_limit;
        $data['fields'] = $this->table_fields;
        $data['module_details'] = $this->module_details;
        $data['keyword'] = $this->search_keyword;
        if ($request->ajax()) {
            if ($data['keyword']) {
                $items = $role->where('name', 'LIKE', "%" . $data['keyword'] . "%")
                    ->paginate($this->page_limit);
            } else {
                $items = $role->paginate($this->page_limit);
            }
            $ajax_data = [];
            $ajax_data['success'] = 1;
            $ajax_data['items'] = $items;
            $ajax_data['total_rows'] = count($items);
            $ajax_data['table_rows_html'] = view('admin.roles.table-index', $ajax_data)->render();
            $ajax_data['paginations'] = view('admin.datatables.pagination', $ajax_data)->render();
            return response()->json($ajax_data);
        }
        return view('admin.roles.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $permission = new Permission();
        $permission = $permission->all();
        $grouped_permissions = $permission->groupBy('group_title');
        $data['permissions'] = $grouped_permissions;
        $data['module_details'] = $this->module_details;
        return view('admin.roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_title' => 'required',
            'role_gaurd' => 'required'
        ]);
        $role = new Role();
        $role->name = $request->input('role_title');
        $role->guard_name = $request->input('role_gaurd');
        $role->save();
        // Permission Assigned to the Roles
        $role_id = $role->id;
        if ($request->permission) {
            // Delete the All permission related to the Role
            // $deletedPermissions = RolePermission::where('role_id', $role_id)->delete();
            foreach ($request->permission as $permission) {
                $RolePermission = new RolePermission();
                $RolePermission->permission_id = $permission;
                $RolePermission->role_id = $role_id;
                $RolePermission->save();
            }
        }
        return redirect()->route('roles.index')->withSuccess('Role added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $role = new Role();
        $role_details = $role::find($id);
        if ($role_details) {
            $role_id = $role_details->id;
            $permission = new Permission();
            $permission = $permission->all();
            $grouped_permissions = $permission->groupBy('group_title');
            // Assign Permissions
            $assignPermissions = RolePermission::where('role_id', $role_id)->get();
            $data = [];
            $data['role'] = $role::find($id);
            $data['permissions'] = $grouped_permissions;
            $data['role_permissions'] = $assignPermissions;
            $data['module_details'] = $this->module_details;
            return view('admin.roles.edit', $data);
        } else {
            dd('Not Found Records');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role_title' => 'required',
            'role_gaurd' => 'required'
        ]);
        $role = Role::find($id);
        $role->name = $request->input('role_title');
        $role->guard_name = $request->input('role_gaurd');
        $role->update();
        // Permission Assigned to the Roles
        $role_id = $role->id;
        //Delete the All permission related to the Role
        RolePermission::where('role_id', $role_id)->delete();
        if ($request->permission) {
            foreach ($request->permission as $permission) {
                $RolePermission = new RolePermission();
                $RolePermission->permission_id = $permission;
                $RolePermission->role_id = $role_id;
                $RolePermission->save();
            }
        }
        return redirect()->route('roles.index')->withSuccess('Role Updates Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $role = Role::find($id);
        RolePermission::where('role_id', $role->id)->delete();
        $role->delete();
        return redirect()->route('roles.index')->withSuccess('Role and Assigned Permissions Deleted Successfully!');
    }
}
