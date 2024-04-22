<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Permission;
use Illuminate\Http\Request;


class PermissionsController extends Controller
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
            'page_title' => 'Permissions',
            'button_title' => 'Permission',
        );

        $this->table_fields = array(
            'id' => 'Id',
            'title' => 'Title',
            'gaurd_name' => 'Guard Name',
            'gaurd_type' => 'Guard Type',
            'group_title' => 'Group Title',
            'created_at' => 'Added Date',
        );
    }

    public function index(Request $request)
    {
        $permission = new Permission();
        $data = [];
        $data['page'] = 1;
        $data['page_limit'] = $this->page_limit;
        $data['fields'] = $this->table_fields;
        $data['keyword'] = $this->search_keyword;
        if ($request->ajax()) {
            // Convert into the model works
            if ($data['keyword']) {
                $items = $permission->where('name', 'LIKE', "%" . $data['keyword'] . "%")
                    ->paginate($this->page_limit);
            }else{
                $items = $permission->paginate($this->page_limit);
            }
            // Convert into the model works
            $ajax_data = [];
            $ajax_data['success'] = 1;
            $ajax_data['items'] = $items;
            $ajax_data['total_rows'] = count($items);
            $ajax_data['table_rows_html'] = view('admin.permissions.table-index', $ajax_data)->render();
            $ajax_data['paginations'] = view('admin.datatables.pagination', $ajax_data)->render();
            return response()->json($ajax_data);
        }
        $data['module_details'] = $this->module_details;
        return view('admin.permissions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['module_details'] = $this->module_details;
        return view('admin.permissions.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'permission_title' => 'required',
            'permission_gaurd_title' => 'required',
            'permission_gaurd_type' => 'required',
            'permission_group_title' => 'required'
        ]);

        $permission = new Permission();
        $permission->title = $request->input('permission_title');
        $permission->gaurd_name = $request->input('permission_gaurd_title');
        $permission->gaurd_type = $request->input('permission_gaurd_type');
        $permission->group_title = $request->input('permission_group_title');
        $permission->save();
        return redirect()->route('permissions.index')->withSuccess('Permission added Successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
