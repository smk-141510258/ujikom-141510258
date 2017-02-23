@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Penggajian</div>
                      <div class="panel-body">
                    <div class="col-md-12">
                        <center><a href="{{url('penggajian/create')}}" class="btn btn-info ">Tambah Data</a></center><hr>
                        <center>{{$penggajian->links()}}</center>
                    </div>
                    <table border="1" class="table table-striped table-border table-hover">

                        <thead>
                        <tr class="bg-info">
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Nip Pegawai</th> 
                        <th>Status Pengambilan</th>
                        <th colspan="3"><center>Opsi</center></th>
                        </tr>

                        @php
                            $no=1 ;
                        @endphp
                        @foreach($penggajian as $penggajians)
                        <td>{{$no++}}</td>                        
                        <td>{{$penggajians->TunjanganPegawai->Pegawai->User->name}}</td>
                        <td>{{$penggajians->TunjanganPegawai->Pegawai->nip}}</td>
                        <td><b>@if($penggajians->tanggal_pengambilan == ""&&$penggajians->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @elseif($penggajians->tanggal_pengambilan == ""||$penggajians->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @else
                            Gaji Sudah Diambil Pada {{$penggajians->tanggal_pengambilan}}
                        @endif</b></td>


                        </h5>
                        
                                <td><a class="btn btn-primary form-control" href="{{route('penggajian.show',$penggajians->id)}}">Lihat</a></td>
                                     <td>{!!Form::open(['method'=>'DELETE','route'=>['penggajian.destroy',$penggajians->id]])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger col-md-12'])!!}</td>
                                    {!!Form::close()!!}
                                
                        </center>
                        </div> 
                        @endforeach
                        
                    </table>
                </div>

           

        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

