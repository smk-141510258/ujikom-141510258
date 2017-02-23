@extends('layouts.app')
@section('kategori')
    active
@endsection
@section('content')
<h1>Edit Kategori Lembur</h1>
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Edit Kategori Lembur</div>
                <div class="panel-body">
					{!! Form::model($kategori,['method'=>'PATCH','route'=>['kategori.update',$kategori->id]])!!}
						{!! Form::hidden('id',null,['class'=>'form-control']) !!}
                        <div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
                            <label for="kode_lembur" class="col-md-4 control-label">Kode Kategori</label>

                            <div class="col-md-6">
                                {!! Form::text('kode_lembur',null,['class'=>'form-control']) !!}
                                @if ($errors->has('kode_lembur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
                            <label for="golongan_id" class="col-md-4 control-label">Nama Golongan</label>
                            <div class="col-md-6">
                                <select name="golongan_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($golongan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('golongan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('golongan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
                            <label for="jabatan_id" class="col-md-4 control-label">Nama Jabatan</label>

                            <div class="col-md-6">
                                <select name="jabatan_id" class="form-control">
                                    <option value="">pilih</option>
                                    @foreach($jabatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('jabatan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
						{!! Form::submit('Save',['class'=>'btn btn-primary form-control']) !!}
					</div>
				{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection