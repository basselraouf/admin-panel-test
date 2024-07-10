<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showUsers()
    {
        $users = User::all();
        return view('layouts.admin',compact('users'));
    }

    public function import(Request $request)
    {
        try{
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        Excel::import(new UsersImport, $request->file('file'));

        return redirect()->back()->with('success', 'Users imported successfully.');

        }catch(\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Error importing users: ' . $e->getMessage());
        }
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
