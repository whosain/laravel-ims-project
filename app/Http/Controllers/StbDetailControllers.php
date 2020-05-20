<?php

namespace App\Http\Controllers;

use App\ModelStb;
use App\ModelStbDetail;
use App\ModelTreckingStb;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class StbDetailControllers extends Controller
{
    //

    public function index(Request $request)
    {
              
        //return Datatables::of(M_login::query())->make(true);
        DB::statement(DB::raw('set @rownum=0'));
        if ($request->ajax()) {
            $data = DB::table('stb_detail')
		            ->join('master_vendor_svn', 'stb_detail.vendor_id', '=', 'master_vendor_svn.id')
                    ->leftJoin('stb_customer', 'stb_detail.id', '=', 'stb_customer.stb_detail_id')
                    ->leftJoin('master_building', 'stb_customer.building_id', '=', 'master_building.id')
                    ->leftJoin('master_customer_svn', 'stb_customer.customer_id', '=', 'master_customer_svn.id')
                    ->leftJoin('master_lokasi', 'stb_customer.lokasi_id', '=', 'master_lokasi.id')
                    ->where('stb_detail.stb_id', $request->get('stb'))
		            ->select('stb_detail.stb_id','stb_detail.id','master_vendor_svn.name','master_customer_svn.name as custname','master_building.building_name','master_lokasi.nama_lokasi',DB::raw('DATE_FORMAT(stb_detail.purchase_date, "%d-%m-%Y") as date'), 'stb_detail.product_model','stb_detail.mac_address','stb_detail.serial_number','stb_detail.remarks','stb_detail.status',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
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
                    ->addColumn('checkbox',function($row){

                        $btn ='<input type="checkbox" name="select[]" id="select'.$row->rownum.'" value="'.$row->rownum.'" />
                            <input type="hidden" name="id[]" id="id'.$row->rownum.'" value="'.$row->id.'" />
                            <input type="hidden" name="idhead[]" id="idhead'.$row->rownum.'" value="'.$row->stb_id.'" />';
                        return $btn;
                        
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);

        }
      	$dataven['stb'] = $request->stbid;
        $idven  = DB::select('select * from stb_header where id = '.$request->stbid.'');
        
        foreach ($idven as $key ) {
            $vendid = $key->vendor_id;
            
        }
        $dataven['vendor'] = DB::select('select * from master_vendor_svn where id = '.$vendid.'');

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


    public function insertcustomer(Request $request)
    {

        for ($i=0; $i < count($_POST['id']); $i++) { 
            # code...
            $data =  new ModelTreckingStb();
            $data->customer_id = $_POST['id'][$i]['customer'];
            $data->stb_header_id = $_POST['id'][$i]['stbheadid'];
            $data->stb_detail_id = $_POST['id'][$i]['idstb'];
            $data->building_id = $_POST['id'][$i]['building'];
            $data->lokasi_id = $_POST['id'][$i]['location'];
            $data->save();
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
