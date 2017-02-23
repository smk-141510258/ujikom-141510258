@extends('layouts.app')
@section('Lembur')
    active
@endsection
@section('content')
<div class="container">
  <div class="col-md-8 col-md-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading">Lembur Pegawai</div>
		<div class="panel-body">
		<a class="btn btn-info" href="{{url('lembur/create')}}">Tambah Data</a><br><br>
			  <table border="1" class="table table-striped table-border table-hover">
				<thead>
				<tr class="bg-info">
				<th>Lembur Ke-</th>
				<th>Nama Pegawai</th>
				<th>Kode Kategori Lembur</th>
				<th>Jumlah Jam</th>
				<th colspan="2"><center>Action</center></th>
			</tr>
		</thead>
		@php $no=1; @endphp
		<tbody>
			@foreach($lembur as $data)
			<tr>
				<td>{{$no++}}</td>
				<td>{{$data->Pegawai->user->name}}</td>
				<td>{{$data->KategoryLembur->kode_lembur}}</td>
				<td>{{$data->jumlah_jam}}</td>
				<td>
					 btn-warning'> Edit </a>
				</td>
				<td>
			    <form method="POST" action=" {{route('lembur.destroy', $data->id)}} ">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<input class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							</form>
			</tr>
			@endforeach
		</tbody>
	</table>
	</a>
</div>
</div>
</div>

@endsection