<?php

namespace App\Http\Controllers;

use App\ModelStb;
use App\ModelStbDetail;
use App\ModelTreckingStb;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;

class TreckingStbController extends Controller
{
    //
    public function index(Request $request)
    {
        //return Datatables::of(M_login::query())->make(true);
        if ($request->ajax()) {

            if ($request->get('customer')) {
                DB::query()->where('master_customer_svn.id', $request->get('customer'));
            }
            if ($request->get('building')) {
                DB::query()->where('master_building.id', $request->get('building'));
            }
            if ($request->get('location')) {
                DB::query()->where('master_lokasi.id', $request->get('location'));
            }
            $data = DB::table('stb_detail')
                    ->join('master_vendor_svn', 'stb_detail.vendor_id', '=', 'master_vendor_svn.id')
                    ->leftJoin('stb_customer', 'stb_detail.id', '=', 'stb_customer.stb_detail_id')
                    ->leftJoin('master_building', 'stb_customer.building_id', '=', 'master_building.id')
                    ->leftJoin('master_customer_svn', 'stb_customer.customer_id', '=', 'master_customer_svn.id')
                    ->leftJoin('master_lokasi', 'stb_customer.lokasi_id', '=', 'master_lokasi.id')
                    ->select('stb_detail.stb_id','stb_detail.id','master_vendor_svn.name','master_customer_svn.name as custname','master_building.building_name','master_lokasi.nama_lokasi',DB::raw('DATE_FORMAT(stb_detail.purchase_date, "%d-%m-%Y") as date'), 'stb_detail.product_model','stb_detail.mac_address','stb_detail.serial_number','stb_detail.remarks','stb_detail.status')
                    ->get();

            return Datatables::of($data)

            ->make(true);
        }
      	
        return view('treckingstb');
    }

    public function DataCustomer(Request $request)
    {
        if ($request->has('q')){
            $cari = $request->q;
            $data = DB::table('master_customer_svn')->select('id', 'name')->where('name', 'LIKE', "%$cari%")->get();
            return response()->json($data);
        }
    }

    public function DataBuilding(Request $request)
    {

        if ($request->has('q')){
            $cari = $request->q;

            $data = DB::table('master_building')->select('id', 'building_name')->where('building_name', 'LIKE', "%$cari%")->get();
            return response()->json($data);
        }
    }


    public function DataLocation(Request $request)
    {
    	
        if ($request->has('q')){
            $cari = $request->q;
            $data = DB::table('master_lokasi')->select('id', 'nama_lokasi')->where('nama_lokasi', 'LIKE', "%$cari%")->get();
            return response()->json($data);
        }
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
