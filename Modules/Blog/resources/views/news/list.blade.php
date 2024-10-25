@extends('layouts.main', ['title' => $title ])

@section('content')
 
<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <h3 class="card-title">List {{ $title }}</h3>
        <div class="float-right">
          @if (permissionCheck('add'))
            <a href="{{ url('blog/news/add') }}" class="btn bg-gradient-primary btn-sm">Tambah data</a>
          @endif
        </div>
    </div>
    <div class="card-body">
      <table id="datatable-def" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Urutan</th>
          <th>Judul</th>
          <th>Dibuat tanggal</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $value)
            <tr>
              <td width="20" class="text-center">{{ $value->sequence }}</td>
              <td>{{ $value->title }}</td>
              <td>{{ dateFormat($value->created_at) }}</td>
              <td>
                <div class="btn-group btn-block">
                  @if (permissionCheck('show')) <a href="{{ url('blog/news/edit/'.$value->id) }}" class="btn btn-warning btn-sm">Edit</a> @endif
                  @if (permissionCheck('delete')) <a href="{{ url('blog/news/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Hapus</a> @endif
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