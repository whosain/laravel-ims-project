<?php

namespace App\Http\Controllers;

use App\ModelStb;
use App\ModelStbDetail;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class StbDetailController extends Controller
{
    //

    public function index(Request $request)
    {
              
        //return Datatables::of(M_login::query())->make(true);
        if ($request->ajax()) {
            $data = DB::table('stb_detail')
		            ->join('master_vendor_svn', 'stb_detail.vendor_id', '=', 'master_vendor_svn.id')
                    ->where('stb_detail.stb_id', $request->get('stb'))
		            ->select('stb_detail.id','master_vendor_svn.name',DB::raw('DATE_FORMAT(stb_detail.purchase_date, "%d-%m-%Y") as date'), 'stb_detail.product_model','stb_detail.mac_address','stb_detail.serial_number','stb_detail.remarks','stb_detail.status')
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
                                        <li>
                                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-sm editProduct">Edit</a>
                                        </li>
                                    </ul>
                                </div>';
   
                        /*$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';*/
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

        }
      	$dataven['stb'] = $request->stbid;
        return view('stbdetails')->with($dataven);
    }



	public function store(Request $request)
    {

        ModelStbDetail::updateOrCreate(['id' => $request->id],
                ['mac_address'=>$request->mac,'serial_number'=>$request->serial]);
        
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
        $product = ModelStbDetail::find($id);
        return response()->json($product);
    }

    public function destroy($id)
    {
    	ModelStb::find($id)->delete();
       	DB::table('stb_detail')->where('stb_id', $id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
