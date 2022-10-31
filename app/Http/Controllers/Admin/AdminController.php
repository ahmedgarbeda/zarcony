<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.index');
    }

    public function datatables()
    {

        $brands = User::query()->where('is_admin',1);

        return DataTables::of($brands)
            ->addColumn('operations',function ($row){
                return '<a href="'.route("admins.edit",$row->id).'" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>'.
                    '<button class="btn btn-danger btn-sm" type="button" onclick="deleteRow(\''.$row->id.'\')">
                                            <i class="fas fa-trash"></i>
                                        </button>';
            })

            ->rawColumns(['operations' => 'operations'])
            ->toJson();
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $validated['is_admin'] = 1;
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);
        toast('Admin created successfully','success','top-right');
        return redirect()->route('admins.index');
    }

    public function edit(User $admin)
    {
        return view('admins.edit',compact('admin'));
    }
    public function update(Request $request, User $admin)
    {
        $validated = $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,'.$admin->id,
            'email' => 'required|email|unique:users,email,'.$admin->id,
        ]);
        if ($request->get('password')){
            $request->validate(['password' => 'required|confirmed|min:6']);
            $validated['password'] = $request->get('password');
        }
        $admin->update($validated);
        toast('Admin updates successfully','success','top-right');
        return redirect()->route('admins.index');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        return response(['message' => 'Admin deleted successfully']);
    }
}
