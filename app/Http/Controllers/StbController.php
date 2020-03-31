<?php

namespace App\Http\Controllers;

use App\ModelStb;
use App\ModelStbDetail;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class StbController extends Controller
{
    //
    public function index(Request $request)
    {
        //return Datatables::of(M_login::query())->make(true);
        if ($request->ajax()) {
            $data = DB::table('stb_header')
		            ->join('master_vendor_svn', 'stb_header.vendor_id', '=', 'master_vendor_svn.id')
		            ->select('stb_header.id','master_vendor_svn.name',DB::raw('DATE_FORMAT(stb_header.received_date, "%d-%m-%Y") as date'), 'stb_header.judul','stb_header.keterangan','stb_header.stock_balance','stb_header.remarks')
		            ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<div class="btn-group">
                                    
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a></li>
                                        <li><a href="/laravel-ims-project/public/stbdetail/'.$row->id.'" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success btn-sm">Stb Detail</a></li>
                                        <li><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a></li>
                                    </ul>
                                </div>';



                        /*<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                        $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit Stb Detail</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';*/
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      	
      	$dataven['vendor'] = DB::select('select * from master_vendor_svn');
        return view('stb')->with($dataven);
    }


	public function store(Request $request)
    {

        ModelStb::updateOrCreate(['id' => $request->id],
                ['vendor_id' => $request->vendor,'received_date'=>$request->received,'judul'=>$request->judul,'keterangan'=>$request->ket,'stock_balance'=>$request->stock]);
        
        DB::table('stb_detail')
            ->where('stb_id', $request->id)
            ->update(['vendor_id' => $request->vendor,'purchase_date'=>$request->received,'product_model'=>$request->judul]);   
        return response()->json(['success'=>'Product saved successfully.']);
    }
    
    public function insert(Request $request)
    {

        $data =  new ModelStb();
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
            $data1 =  new ModelStbDetail();
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
        $product = ModelStb::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
    	ModelStb::find($id)->delete();
       	DB::table('stb_detail')->where('stb_id', $id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
