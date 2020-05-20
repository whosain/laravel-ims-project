<?php

namespace App\Http\Controllers;

use App\ModelAsetSvn;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class AsetSvnController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('users')->select('id', 'email')->where('email', 'LIKE', '%$cari%')->get();
            return response()->json($data);
        }
    }
}
