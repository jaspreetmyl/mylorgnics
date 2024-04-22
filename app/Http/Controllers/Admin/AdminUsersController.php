<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminUsers;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
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
            'page_title' => 'Admin Users',
            'button_title' => 'Admin User',
        );

        $this->table_fields = array(
            'id' => 'Id',
            'name' => 'Name',
            'email' => 'Email',
            'created_at' => 'Added Date',
        );
    }

    public function index(Request $request)
    {
        $data = [];
        $admin_user = new AdminUsers();
        $data['page'] = 1;
        $data['page_limit'] = $this->page_limit;
        $data['fields'] = $this->table_fields;
        $data['keyword'] = $this->search_keyword;
        if ($request->ajax()) {
            if ($data['keyword']) {
                $items = $admin_user->where('name', 'LIKE', "%" . $data['keyword'] . "%")
                    ->paginate($this->page_limit);
            } else {
                $items = $admin_user->paginate($this->page_limit);
            }
            $ajax_data = [];
            $ajax_data['success'] = 1;
            $ajax_data['items'] = $items;
            $ajax_data['total_rows'] = count($items);
            $ajax_data['table_rows_html'] = view('admin.adminuser.table-index', $ajax_data)->render();
            $ajax_data['paginations'] = view('admin.datatables.pagination', $ajax_data)->render();
            return response()->json($ajax_data);
        }
        $data['module_details'] = $this->module_details;
        $data['keyword'] = $this->search_keyword;
        return view('admin.adminuser.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
