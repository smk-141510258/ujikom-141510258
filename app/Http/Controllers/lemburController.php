<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use Input;
use App\LemburPegawai;
use App\Pegawai;
use App\KategoryLembur;


class lemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $lembur=LemburPegawai::all();
        return view('LemburPegawai.index',compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $pegawai=Pegawai::all();
         $kategori=KategoryLembur::all();

        return view('LemburPegawai.create',compact('pegawai','kategori'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
              $roles=[
            'kode_lembur_id'=>'unique:lembur_pegawais',
            'pegawai_id'=>'required',
            'jumlah_jam'=>'required',
        ];
        $sms=[
            'kode_lembur_id.required'=>'tidak boleh kosong',
            'kode_lembur_id.unique'=>'tidak boleh sama',
            'pegawai_id.required'=>'tidak boleh kosong',
            'jumlah_jam.required'=>'tidak boleh kosong',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect('lembur/create')
                    ->WithErrors($validasi)
                    ->WithInput();
        }
          $lembur=Request::all();
          LemburPegawai::create($lembur);
          return redirect('lembur');
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
        //
         $pegawai=Pegawai::all();
         $kategori=KategoryLembur::all();
        $lembur=LemburPegawai::find($id);
        return view('Kategori.edit',compact('kategori','lembur','pegawai'));
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
        //
        $lembur=LemburPegawai::where('id',$id)->first();
        if($lembur['kode_lembur_id']!= Request('kode_lembur_id')){

             $roles=[
            'kode_lembur_id'=>'required|unique:lembur_pegawais,kode_lembur_id',
            'pegawai_id'=>'required',
            'Jumlah_jam'=>'required',
        ];
        }
        else{
            $roles=[
           'kode_lembur_id'=>'required',
            'pegawai_id'=>'required',
            'Jumlah_jam'=>'required',];
        }
         $sms=[
            'kode_lembur_id.required'=>'tidak boleh kosong',
            'kode_lembur_id.unique'=>'tidak boleh sama',
            'pegawai_id.required'=>'tidak boleh kosong',
            'Jumlah_jam.required'=>'tidak boleh kosong',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()  
                             ->WithErrors($validasi)
                    ->WithInput();
        }
  $update=Request::all();
  $lembur=LemburPegawai::find($id);
  $lembur->update($update);
  return redirect('lembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $lembur=LemburPegawai::find($id)->delete();
        return redirect('lembur');
    
    }
}
