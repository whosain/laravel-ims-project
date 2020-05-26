<?php

namespace App\Http\Controllers;

use App\ModelScn;
use App\ModelScnDetail;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
// use Datatables;
use DB;

class scnDetailController extends Controller
{
    //
    public function index(Request $request)
    {
        //return Datatables::of(M_login::query())->make(true);
        if ($request->ajax()) {
            $data = DB::table('stb_detail')
		            ->join('master_vendor_svn', 'stb_detail.vendor_id', '=', 'master_vendor_svn.id')
		            ->select('stb_detail.id','master_vendor_svn.name',DB::raw('DATE_FORMAT(stb_detail.purchase_date, "%d-%m-%Y") as date'), 'stb_detail.product_model','stb_detail.mac_address','stb_detail.serial_number','stb_detail.remarks','stb_detail.status')
		            ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                        /*$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';*/
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      	
      	$dataven['vendor'] = DB::select('select * from master_vendor_svn');
        return view('scndetail')->with($dataven);
    }


	public function store(Request $request)
    {

        ModelScnDetail::updateOrCreate(['id' => $request->id],
                ['vendor_id' => $request->vendor,'purchase_date'=>$request->purchase,'product_model'=>$request->product,'mac_address'=>$request->mac,'serial_number'=>$request->serial]);
        
        return response()->json(['success'=>'Product saved successfully.']);
    }
    
    public function insert(Request $request)
    {

        $data =  new ModelScn();
        $data->vendor_id = $request->vendor;
        $data->received_date = $request->received;
        $data->judul = $request->judul;
        $data->keterangan = $request->ket;
        $data->stock_balance = $request->stock;
        $data->create_by = 'tes';               
        $data->save();

		$id = $data->id;
		$stock = $request->stock;
		for ($i=0; $i < $stock; $i++) { 
            # code...
            $data1 =  new ModelScnDetail();
            $data1->vendor_id = $request->vendor;
            $data1->stb_id = $id;
            $data1->product_model = $request->judul;
            $data1->purchase_date = $request->received;
            $data1->save();
        }

        return response()->json(['success'=>'Product saved successfully.']);
    }


    public function edit($id)
    {
        $product = ModelScnDetail::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
    	ModelScn::find($id)->delete();
       	DB::table('stb_detail')->where('stb_id', $id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
