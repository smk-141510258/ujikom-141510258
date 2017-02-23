<?php

namespace App\Http\Controllers;
use App\Golongan;
use App\Jabatan;
use App\Tunjangan;
use Validator;
use Input;
use Request;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan=Tunjangan::all();
        return view('Tunjangan.index',compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $golongan=Golongan::all();
        $jabatan=Jabatan::all();
         $tunjangan=Tunjangan::all();
        return view('Tunjangan.create',compact('golongan','jabatan','tunjangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
                'kode_tunjangan'=>'required|unique:tunjangans,kode_tunjangan',
                'golongan_id'=>'required',
                'besaran_uang'=>'required',
                'jabatan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required',
                ];
        $sms=[
                'kode_tunjangan.required'=>'tidak boleh kosong',
                'besaran_uang.required'=>'tidak boleh kosong',
                'kode_tunjangan.unique'=>'jangan sama',
                'golongan_id.required'=>'tidak boleh kosong',
                'jabatan_id.required'=>'tidak boleh kosong',
                'status.required'=>'tidak boleh kosong',
                'jumlah_anak.required'=>'tidak boleh kosong',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }
        
          $tunjangan=Request::all();
          Tunjangan::create($tunjangan);
          return redirect('tunjangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $golongan=Golongan::all();
        $jabatan=Jabatan::all();
        $tunjangan=Tunjangan::find($id);
        return view('Tunjangan.edit',compact('tunjangan','golongan','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori=Tunjangan::where('id',$id)->first();
        if($kategori['kode_tunjangan'] != Request('kode_tunjangan')){

        $rules=[
                'kode_tunjangan'=>'required|unique:tunjangans,kode_tunjangan',
                'golongan_id'=>'required',
                'besaran_uang'=>'required',
                'jabatan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required',
                ];
        }
        else{

        $rules=[
                'kode_tunjangan'=>'required',
                'golongan_id'=>'required',
                'jabatan_id'=>'required',
                'status'=>'required',
                'jumlah_anak'=>'required',
                ];
        }
        $sms=[
                'kode_tunjangan.required'=>'tidak boleh kosong',
                'besaran_uang.required'=>'tidak boleh kosong',
                'kode_tunjangan.unique'=>'jangan sama',
                'golongan_id.required'=>'tidak boleh kosong',
                'jabatan_id.required'=>'tidak boleh kosong',
                'status.required'=>'tidak boleh kosong',
                'jumlah_anak.required'=>'tidak boleh kosong',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }

        $update=Request::all();
        $tunjangan=Tunjangan::find($id);
        $tunjangan->update($update);
        return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tunjangan=Tunjangan::find($id)->delete();
        return redirect('tunjangan');
    
    }
}
