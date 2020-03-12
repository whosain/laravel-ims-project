<?php

namespace App\Http\Controllers;

use App\ModelLokasi;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class LokasiController extends Controller
{
    //
    public function index(Request $request)
    {
        //return Datatables::of(M_login::query())->make(true);
        if ($request->ajax()) {
            $data = DB::table('master_lokasi')
		            ->join('master_company', 'master_lokasi.company_id', '=', 'master_company.id')
		            ->join('master_building', 'master_lokasi.building_id', '=', 'master_building.id')
		            ->select('master_lokasi.id','master_company.company_name','master_building.building_name', 'master_lokasi.nama_lokasi')
		            ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      	$data1['company'] = DB::select('select * from master_company');
      	$data1['building'] = DB::select('select * from master_building');
        return view('lokasi')->with($data1);
    }



    public function store(Request $request)
    {

        ModelLokasi::updateOrCreate(['id' => $request->id],
                ['company_id' => $request->company,'building_id'=>$request->building,'nama_lokasi'=>$request->nama_lok,'status'=>1]);   
        return response()->json(['success'=>'Product saved successfully.']);
    }


    public function edit($id)
    {
        $product = ModelLokasi::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
    	ModelLokasi::find($id)->delete();
       
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
