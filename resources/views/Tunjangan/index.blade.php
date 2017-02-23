@extends('layouts.app')
@section('Lembur')
    active
@endsection
@section('content')
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Jabatan</div>
		<div class="panel-body">
		<a class="btn btn-info" href="{{url('tunjangan/create')}}">Tambah Data</a><br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-info">
				<th>No</th>
				<th>Kode Tunjangan</th>
				<th>Jabatan</th>
				<th>Golongan</th>
				<th>Status</th>
				<th>Jumlah_anak</th>
				<th>Besar Uang<t/h>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($tunjangan as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->kode_tunjangan}}</td>
				<td>{{$data->Jabatan->nama_jabatan}}</td>
				<td>{{$data->Golongan->nama_golongan}}</td>
				<td>{{$data->status}}</td>
				<td>{{$data->jumlah_anak}}</td>
				<td>{{$data->besaran_uang}}</td>
				<td>
				<a href="{{route('tunjangan.edit',$data->id)}}" class='btn btn-xs btn-warning'> Ubah </a>
				</td>
				<td>
				<form method="POST" action=" {{route('tunjangan.destroy', $data->id)}} ">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<input class="btn btn-xs btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							</form>
							</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</a>
</div>
</div>
</div>

@endsection