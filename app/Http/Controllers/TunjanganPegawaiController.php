<?php


namespace App\Http\Controllers;
use App\Pegawai;
use App\Tunjangan;
use App\TunjanganPegawai;
use Validator;
use Input;
use Request;

class TunjanganPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $tunjanganp=TunjanganPegawai::all();
        return view('Tunjanganp.index',compact('tunjanganp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $tunjangan=Tunjangan::all();
         $pegawai=Pegawai::all();
        return view('Tunjanganp.create',compact('pegawai','tunjangan'));
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
          $rules=[
                'kode_tunjangan_id'=>'unique:tunjangan_pegawais,kode_tunjangan_id',
                'pegawai_id'=>'required'
                ];
        $sms=[
                'kode_tunjangan_id.required'=>'tidak boleh kosong',
                'pegawai_id.required'=>'tidak boleh kosong',
                'kode_tunjangan_id.unique'=>'jangan sama',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }
        
          $tunjanganp=Request::all();
          TunjanganPegawai::create($tunjanganp);
          return redirect('tunjanganp');
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
         $tunjangan=Tunjangan::all();
         $tunjanganp=TunjanganPegawai::find($id);
         $pegawai=Pegawai::all();
        return view('Tunjanganp.create',compact('pegawai','tunjanganp','tunjangan'));
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
         $kategori=Tunjangan::where('id',$id)->first();
        if($kategori['kode_tunjangan_id'] != Request('kode_tunjangan_id')){

        $rules=[
                'kode_tunjangan_id'=>'required|unique:tunjangans,kode_tunjangan_id',
                'pegawai_id'=>'required'
                ];
        }
        else{

        $rules=[
                'kode_tunjangan_id'=>'required',
                'pegawai_id'=>'required'
                ];
        }
        $sms=[  'kode_tunjangan_id.required'=>'tidak boleh kosong',
                'pegawai_id.required'=>'tidak boleh kosong',
                'kode_tunjangan_id.unique'=>'jangan sama',
                ];
        $validasi=Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->WithErrors($validasi)
            ->WithInput();
        }

        $update=Request::all();
        $tunjanganp=TunjanganPegawai::find($id);
        $tunjanganp->update($update);
        return redirect('tunjanganp');
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
        $tunjanganp=TunjanganPegawai::find($id)->delete();
        return redirect('tunjanganp');
    }
}
