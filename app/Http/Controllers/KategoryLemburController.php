<?php

namespace App\Http\Controllers;
use App\Golongan;
use App\Jabatan;
use App\KategoryLembur;
use Validator;
use Input;
use Request;

class KategoryLemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=KategoryLembur::all();
        return view('Kategori.index',compact('kategori'));
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
        $kategori=KategoryLembur::all();
        return view('Kategori.create',compact('golongan','jabatan','kategori'));
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
                'kode_lembur'=>'required|unique:kategory_lemburs,kode_lembur',
                'golongan_id'=>'required',
                'jabatan_id'=>'required',
                'besaran_uang'=>'required',
                ];
        $sms=[
                'kode_lembur.required'=>'jangan kosong',
                'besaran_uang.required'=>'jangan kosong',
                'kode_lembur.unique'=>'jangan sama',
                'golongan_id.required'=>'jangan kosong',
                'jabatan_id.required'=>'jangan kosong',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }
        
        $kategori=Request::all();
        KategoryLembur::create($kategori);
        return redirect('kategori');
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
        $kategori=KategoryLembur::find($id);
        return view('Kategori.edit',compact('kategori','golongan','jabatan'));
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
        $kategori=KategoryLembur::where('id',$id)->first();
        if($kategori['kode_lembur'] != Request('kode_lembur')){

        $rules=[
                'kode_lembur'=>'required|unique:kategory_lemburs,kode_lembur

                ',
                'golongan_id'=>'required',
                'besaran_uang'=>'required',
                'jabatan_id'=>'required',
                ];
        }
        else{

        $rules=[
                'kode_lembur'=>'required',
                'golongan_id'=>'required',
                'jabatan_id'=>'required',
                ];
        }
        $sms=[
                'kode_lembur.required'=>'jangan kosong',
                'besaran_uang.required'=>'jangan kosong',
                'kode_lembur.unique'=>'jangan sama',
                'golongan_id.required'=>'jangan kosong',
                'jabatan_id.required'=>'jangan kosong',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }

        $update=Request::all();
        $kategori=KategoryLembur::find($id);
        $kategori->update($update);
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori=KategoryLembur::find($id)->delete();
        return redirect('kategori');
    
    }
}
