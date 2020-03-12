<?php

namespace App\Http\Controllers;

use App\ModelJenis;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class JenisController extends Controller
{
    //
    public function index(Request $request)
    {
        //return Datatables::of(M_login::query())->make(true);
        if ($request->ajax()) {
            $data = ModelJenis::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->jenisid.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->jenisid.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('jenis');
    }



    public function store(Request $request)
    {

        ModelJenis::updateOrCreate(['jenisid' => $request->id],
                ['description' => $request->jens_name]);        
   
        return response()->json(['success'=>'Product saved successfully.']);
    }


    public function edit($id)
    {
        $product = ModelJenis::where('jenisid', $id)->firstOrFail();
        return response()->json($product);
    }

    public function destroy($id)
    {
    	DB::table('master_jenis')->where('jenisid',$id)->delete();
       
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
