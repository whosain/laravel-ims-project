<?php

namespace App\Http\Controllers;

use App\ModelScn;
use Illuminate\Http\Request;
// use Datatables;
use Yajra\Datatables\Datatables;
use DB;

class ScnController extends Controller
{
    //
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data =  DB::table('master_aset_scn')
            // ->join('master_jenis', 'master_aset_scn.jenisid', '=', 'master_jenis.jenisid')
            // 'master_jenis.description',
            ->select('master_aset_scn.id','master_aset_scn.customerno','master_aset_scn.siteid','master_aset_scn.sitename','master_aset_scn.jenisname', 'master_aset_scn.seri', 'master_aset_scn.merk','master_aset_scn.sn',DB::raw('DATE_FORMAT(master_aset_scn.tgl_msk, "%d-%m-%Y") as tglmsk'),'master_aset_scn.pic_install',DB::raw('DATE_FORMAT(master_aset_scn.tgl_install, "%d-%m-%Y") as tglinstall'),'master_aset_scn.pic_dismental',DB::raw('DATE_FORMAT(master_aset_scn.tgl_dismental, "%d-%m-%Y") as tgldismental'),'master_aset_scn.keterangan')
            ->get();
            return Datatables::of($data)
            // return Datatables::of(ModelScn::get())
                    ->addIndexColumn()
                    ->addColumn('action', function($dataAset){
   
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$dataAset->id.'" data-original-title="Edit" class="btn btn-primary btn-xs editAset"><i class="glyphicon glyphicon-edit"></i>Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$dataAset->id.'" data-original-title="Delete" class="btn btn-danger btn-xs deleteAset"><i class="glyphicon glyphicon-trash"></i>Delete</a>';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $temp['datajenis'] = DB::select('select * from master_jenis');
        // $temp['datalokasi'] = DB::select('select * from master_aset_scn');
        return view('scnaset.index')->with($temp);
    }


	public function insert(Request $request)
    {

        $data =  new ModelScn();
        $data->jenisid=$request->jenisname;
        // $data->siteid=$request->sitename;
        $data->jenisname=$request->jenisname;
        $data->merk=$request->merk;
        $data->seri=$request->seri;
        $data->sn=$request->sn;
        $data->tgl_msk=$request->tgl_msk;
        $data->pic_install=$request->picinstall;
        $data->tgl_install=$request->tglinstall;
        $data->pic_dismental=$request->picdismantle;
        $data->tgl_dismental=$request->tgldismantle;
        $data->save();

       
        return response()->json([
            'success'    => true,
            'message'    => 'Aset Created'
        ]);
    }
    
    
    public function store(Request $request)
    {
        // update data pegawai
    DB::table('master_aset_scn')
    // ->join('master_jenis', 'master_aset_scn.jenisid', '=', 'master_jenis.jenisid')
    ->where('id',$request->id)
    ->update(
    [
		'jenisid'=>$request->jenisname,
        // 'siteid'=>$request->sitename,
        'jenisname'=>$request->jenisname,
        'seri'=>$request->seri,
        'merk'=>$request->merk,
        'sn'=>$request->sn,
        'tgl_msk'=>$request->tgl_msk,
        'pic_install'=>$request->picinstall,
        'tgl_install'=>$request->tglinstall,
        'pic_dismental'=>$request->picdismantle,
        'tgl_dismental'=>$request->tgldismantle,
    ]);       
       
        return response()->json([
            'success'    => true,
            'message'    => 'Update Success'
        ]);
    }


    public function edit($id)
    {
        $asets = ModelScn::find($id);
        return response()->json($asets);
    }

    public function destroy($id)
    {
    	ModelScn::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Aset Deleted'
        ]);
    }
}
