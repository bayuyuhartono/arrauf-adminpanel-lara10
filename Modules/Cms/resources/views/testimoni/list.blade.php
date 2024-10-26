@extends('layouts.main', ['title' => $title ])

@section('content')
 
<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <h3 class="card-title">List {{ $title }}</h3>
        <div class="float-right">
          @if (permissionCheck('add'))
            <a href="{{ url('cms/testimoni/add') }}" class="btn bg-gradient-primary btn-sm">Tambah data</a>
          @endif
        </div>
    </div>
    <div class="card-body">
      <table id="datatable-def" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Urutan</th>
          <th>Nama</th>
          <th>Testimoni</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $value)
            <tr>
              <td width="20" class="text-center">{{ $value->sequence }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->description }}</td>
              <td>
                <div class="btn-group btn-block">
                  @if (permissionCheck('show')) <a href="{{ url('cms/testimoni/edit/'.$value->id) }}" class="btn btn-warning btn-sm">Edit</a> @endif
                  @if (permissionCheck('delete')) <a href="{{ url('cms/testimoni/delete/'.$value->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin hapus data ini?')">Hapus</a> @endif
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
 
@endsection