@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Jabatan</div>
		<div class="panel-body">
		<a class="btn btn-info" href="{{url('kategori/create')}}">Tambah Data</a><br><br>
		  <table border="1" class="table table-striped table-border table-hover">
				<thead>
					<tr class="bg-info">
						<th>No</th>
						<th>Kode Lembur</th>
						<th>Jabatan</th>
						<th>Golongan</th>
						<th>Besaran Uang</th>
						<th colspan="3">Pilihan</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				@foreach ($kategori as $kategorys)
				<tbody>
					<tr> 
						<td> {{$no++}} </td>
						<td> {{$kategorys->kode_lembur}} </td>
						<td> {{$kategorys->Jabatan->nama_jabatan}} </td>
						<td> {{$kategorys->Golongan->nama_golongan}} </td>
						<td> Rp.{{$kategorys->besaran_uang}} </td>						
						<td>
							<a class="btn btn-xs btn-info" href=" {{route('kategori.edit', $kategorys->id)}} ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" {{route('kategori.destroy', $kategorys->id)}} ">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<input class="btn   btn-xs btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							</form>
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection