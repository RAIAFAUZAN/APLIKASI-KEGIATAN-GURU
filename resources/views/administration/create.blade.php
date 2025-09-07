@extends('layouts.app')
@section('content')
    <section class="content-header">
      <h1>
        Update Data Administrasi
        <small>User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Administration</li>
      </ol>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <form role="form"  action="{{ route('administration.insert') }}" method="POST">
                            @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-md-8"></div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>&ensp;
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="form-group">
                                <div class="row">
                                    <label for="nama" class="control-label col-sm-2">Nama User</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama" class="form-control"  
                                            placeholder="Masukkan nama user" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="email" class="control-label col-sm-2">Email User</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" 
                                            placeholder="Masukkan email user" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="nama" class="control-label col-sm-2">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control"  
                                            placeholder="Masukkan Password user" required />
                                    </div>
                                </div>                                
                                <div class="row">                                    
                                    <label for="role" class="control-label col-sm-2">Role User</label>
                                    <div class="col-sm-8">
                                        <select name="role" class="form-control select2" required>
                                            <option value="">-- Pilih Role --</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Guru" >Guru</option>
                                            <option value="Siswa" >Siswa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    	<a href="{{ route('administration') }}">Back to Index</a>

    </section>


@endsection
