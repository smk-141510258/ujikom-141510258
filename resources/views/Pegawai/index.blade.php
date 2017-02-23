@extends('layouts.app')
@section('pegawai')
    active
@endsection
@section('content')
   <div class="col-md-6 ">
			            <div class="panel panel-info">
			                <div class="panel-heading">Data User</div>
			                <div class="panel-body">
			                 <table border="1" class="table table-striped table-border table-hover">
									<thead >
										<tr class ="bg-info">
											<th>Name</th>
											<th>Type User</th>
											<th>Email</th>
										</tr>
									</thead>
									@php $no=1; @endphp
									<tbody>
										@foreach($pegawai as $pegawais)
										<tr>
											<td>{{$pegawais->User->name}}</td>
											<td>{{$pegawais->User->permision}}</td>
											<td>{{$pegawais->User->email}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
			                </div>
			            </div>
			        </div>

			        <div class="col-md-6 col-md-offset-0">
			            <div class="panel panel-info">
			                <div class="panel-heading">Data Pegawai</div>
			                <div class="panel-body">
			                      <table  border="3" class="table table-striped table-bordered table-hover">
									<thead >
										<tr class ="bg-info">
											<th>No</th>
											<th>NIP</th>
											<th>Nama Golongan</th>
											<th>Nama Jabatan</th>
											<th>Photo</th>
											<th colspan="2"><center>Action</center></th>

										</tr>
									</thead>
									@php $no=1; @endphp
									<tbody>
										@foreach($pegawai as $pegawais)
										<tr>
											<td>{{$no++}}</td>
											<td>{{$pegawais->nip}}</td>
											<td>{{$pegawais->Golongan->nama_golongan}}</td>
											<td>{{$pegawais->Jabatan->nama_jabatan}}</td>
											<td> <img src="assets/image/{{$pegawais->photo}}" width="50" height="50"></td>						
						                    <td>
							                <a class="btn btn-warning" href=" {{route('pegawai.edit', $pegawais->id)}} ">Ubah</a>
					 	                   </td>
					                  	<td>
					 		            <form method="POST" action=" {{route('pegawai.destroy', $pegawais->id)}} ">
								         {{csrf_field()}}
								         <input type="hidden" name="_method" value="DELETE">
							          	<input class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit" value="Hapus">
							               </form>

											</td>
											
										</tr>
										@endforeach

									</tbody>

								</table>
									<a  href="{{url('pegawai/create')}}" class="btn btn-info">Tambah</a>
			                </div>
			            </div>
			        </div>
	@endsection		     