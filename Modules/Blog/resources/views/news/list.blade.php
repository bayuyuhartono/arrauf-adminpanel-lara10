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
          <th>No</th>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Status</th>
          <th>Dibuat tanggal</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $value)
            <tr>
              <td width="20" class="text-center">{{ $key+1 }}</td>
              <td>
                @if (isset($value->image))
                  <img class="img-fluid" src="{{ asset($value->image) }}" alt="Photo" width="120"> 
                @else
                  <img class="img-fluid" src="{{ asset('assets/images/sample/nopict.jpg') }}" alt="Photo" width="120">
                @endif
              </td>
              <td>{{ $value->title }}</td>
              <td>{!! $value->is_active === 0 
                ? '<span class="btn bg-gradient-danger btn-sm">Tidak Aktif</span>' 
                : '<span class="btn bg-gradient-primary btn-sm">Aktif</span>' 
              !!}</td>
              <td>{{ dateFormat($value->created_at) }}</td>
              <td>
                <div class="btn-group btn-block">
                  @if (permissionCheck('show')) <a href="{{ url('blog/news/edit/'.$value->uuid) }}" class="btn btn-warning btn-sm">Edit</a> @endif
                  @if (permissionCheck('delete')) <a href="{{ url('blog/news/delete/'.$value->uuid) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin hapus data ini?')">Hapus</a> @endif
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