@extends('layouts.app')
@section('Lembur')
    active
@endsection
@section('content')
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Tunjangan Pegawai</div>
		<div class="panel-body">
		<a class="btn btn-info" href="{{url('tunjanganp/create')}}">Tambah Data</a><br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-info">
				<th>No</th>
				<th>Kode Tunjangan</th>
				<th>pegawai</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($tunjanganp as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->Tunjangan->kode_tunjangan}}</td>
				<td>{{$data->Pegawai->nip}}</td>
				<td>
				<a href="{{route('tunjanganp.edit',$data->id)}}" class='btn btn-xs btn-warning'> Ubah </a>
				</td>
				<td>
				<form method="POST" action=" {{route('tunjanganp.destroy', $data->id)}} ">
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