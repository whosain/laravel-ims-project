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
            ->join('master_jenis', 'master_aset_scn.jenisid', '=', 'master_jenis.jenisid')
            ->select('master_aset_scn.id','master_aset_scn.customerno','master_aset_scn.siteid','master_aset_scn.sitename','master_jenis.description','master_aset_scn.jenisname', 'master_aset_scn.seri', 'master_aset_scn.merk','master_aset_scn.sn','master_aset_scn.tgl_msk','master_aset_scn.location','master_aset_scn.keterangan')
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
        $temp['datalokasi'] = DB::select('select * from master_aset_scn');
        return view('scnaset.index')->with($temp);
    }


	public function store(Request $request)
    {

        ModelScn::updateOrCreate(['id' => $request->id],
        [
        'jenisid'=>$request->jenisname,
        'siteid'=>$request->sitename,
        'jenisname'=>$request->description,
        'merk'=>$request->merk,
        'seri'=>$request->seri,
        'sn'=>$request->sn,
        'tgl_msk'=>$request->tgl_msk,
        'sitename'=>$request->sitename,
        'location'=>$request->location,
        'keterangan'=>$request->keterangan,
        ]);        

       
        return response()->json([
            'success'    => true,
            'message'    => 'Aset Created'
        ]);
    }
    
    public function insert(Request $request)
    {

       
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
