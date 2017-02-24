@extends('layouts.app')
@section('content')
<div class="col-md-12">
   <div class="panel panel-info">
        <div class="panel-heading">Penggajian</div>
        <div class="panel-body">
        <a class="btn btn-primary" href="{{url('penggajian/create')}}">Tambah Data</a><br><br>
            <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="bg-primary">
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Nip Pegawai</th> 
                            <th>Status Pengambilan</th>
                            <th colspan="3"> <center>Opsi</center></th>
                            </tr>
                        </thead>

                        @php
                            $no=1 ;
                        @endphp
                        <tbody>
                        @foreach($penggajian as $penggajians)
                        <td>{{$no++}}</td>                        
                        <td>{{$penggajians->TunjanganPegawai->Pegawai->User->name}}</td>
                        <td>{{$penggajians->TunjanganPegawai->Pegawai->nip}}</td>
                        <td><b>@if($penggajians->tgl_pengambilan == ""&&$penggajians->status_pengambilan == "0")

                        Gaji Belum Diambil

                                <div >

                                    <a class="btn btn-primary" href="{{route('penggajian.edit',$penggajians->id)}}">Ambil</a>

                                </div>

                            

                        @elseif($penggajians->tgl_pengambilan == ""||$penggajians->status_pengambilan == "0")

                            Gaji Belum Diambil

                            <div>

                                    <a class="btn btn-primary" href="{{route('penggajian.edit',$penggajians->id)}}">Ambil</a>

                                </div>

                        @else

                            Gaji Sudah Diambil Pada {{$penggajians->tgl_pengambilan}}

                        @endif</b></td>





                        </h5>
                        
                                <td><a class="btn btn-primary" href="{{route('penggajian.show',$penggajians->id)}}">Lihat</a></td>
					                  	<td>
					 		            <form method="POST" action=" {{route('penggajian.destroy', $penggajians->id)}} ">
								         {{csrf_field()}}
								         <input type="hidden" name="_method" value="DELETE">
							          	<input class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							               </form>
                        </center>
                        </div> 
                          </tbody>
                        @endforeach
                        
                    </table>
                </div>

           
        
@endsection

