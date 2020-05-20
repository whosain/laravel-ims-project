<?php

namespace App\Http\Controllers;

use App\ModelVendorSvn;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class VendorSvnController extends Controller
{
    //
    public function index(Request $request)
    {
        //return Datatables::of(M_login::query())->make(true);
        if ($request->ajax()) {
            $data = DB::table('master_vendor_svn')
		            ->join('master_company', 'master_vendor_svn.company_id', '=', 'master_company.id')
		            ->select('master_vendor_svn.id','master_company.company_name', 'master_vendor_svn.name', 'master_vendor_svn.name_short','master_vendor_svn.email','master_vendor_svn.phone','address','master_vendor_svn.notes')
		            ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<center>
                                    <div class="btn-group">
                                    
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a></li>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm view">View</a></li>
                                            <li><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a></li>
                                        </ul>
                                    </div>
                                </center>';


                        
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      	$data1['company'] = DB::select('select * from master_company');
        return view('vendorsvn')->with($data1);
    }



    public function store(Request $request)
    {

        ModelVendorSvn::updateOrCreate(['id' => $request->id],
                ['company_id' => $request->company,'name'=>$request->vend_name,'name_short'=>$request->vend_short,'email'=>$request->email,'phone'=>$request->phone,'address'=>$request->address,'notes'=>$request->note]);        
   
        return response()->json(['success'=>'Product saved successfully.']);
    }


    public function edit($id)
    {
        $product = ModelVendorSvn::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
    	ModelVendorSvn::find($id)->delete();
       
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
