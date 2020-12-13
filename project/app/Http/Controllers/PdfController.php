<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class PdfController extends Controller
{
    public function index()
    {
        $user_data = DB::table('users')->get();
        return view('export_excel')->with('user_data', $user_data);
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
