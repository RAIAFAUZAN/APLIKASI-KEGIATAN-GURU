@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Welcome, {{ auth()->user()->user_name }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="col-md-12 table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Action</th>    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $i => $user)
                                                            <tr>
                                                                <td>{{ $i+1 }}</td>
                                                                <td>{{ $user->user_name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>{{ $user->role }}</td>
                                                                <td>
                                                                    <a href="{{ route('administration.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                                                        <i class="fa fa-edit"></i> Edit
                                                                    </a>
                                                                    <form action="{{ route('administration.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')">
                                                                            <i class="fa fa-trash"></i> Hapus
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach


                                                <tr>
                                                    <td>1</td>
                                                    <td>Rai</td>
                                                    <td>Rai@gmail.com</td>
                                                    <td>Murid</td>
                                                    <td><a href="#" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>&nbsp;&nbsp;</a></td>
                                                </tr>
                                            </tbody>
                                        </table>                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>
@endsection
