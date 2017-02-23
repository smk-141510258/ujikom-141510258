@extends('layouts.app')

@section('content')

<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">Golongan</div>
		<div class="panel-body">
		
			  <table border="1" class="table table-striped table-border table-hover">
				<thead>
					<tr class="bg-info">
						<th>No</th>
						<th>Kode Golongan</th>
						<th>Nama Golongan</th>
						<th>Besaran Uang</th>
						<th colspan="3">Action</th>
					</tr>
				</thead>

				<?php $no=1; ?>
				@foreach ($golongan as $golongans)
				<tbody>
					<tr> 
						<td> {{$no++}} </td>
						<td> {{$golongans->kode_golongan}} </td>
						<td> {{$golongans->nama_golongan}} </td>
						<td> Rp.{{$golongans->besaran_uang}} </td>
						<td>
							<a class="btn  btn-warning" href=" {{route('golongan.edit', $golongans->id)}} ">Ubah</a>
						</td>
						<td>
							<form method="POST" action=" {{route('golongan.destroy', $golongans->id)}} ">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">

								<input class="btn  btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
								<span class="glyphicon glyphicon-name"></span>

							</form>
						</td>
					</tr>
				</tbody>
				@endforeach

			</table>
			<a class="btn btn-info" href="{{url('golongan/create')}}">Tambah Data</a><br><br>
		</div>
	</div>
</div>

@endsection