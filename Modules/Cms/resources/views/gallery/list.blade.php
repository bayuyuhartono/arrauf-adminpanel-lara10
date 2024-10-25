@extends('layouts.main', ['title' => $title ])

@section('content')
 
<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <h3 class="card-title">List {{ $title }}</h3>
        <div class="float-right">
          @if (permissionCheck('add', '', 3))
            <a href="{{ url('cms/gallery/'.$type.'/add') }}" class="btn bg-gradient-primary btn-sm">Tambah data</a>
          @endif
        </div>
    </div>
    <div class="card-body">
      <table id="datatable-def" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Urutan</th>
          <th>Gambar</th>
          <th>Caption</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $value)
            <tr>
              <td width="20" class="text-center">{{ $value->sequence }}</td>
              <td>
                @if (isset($value->image))
                  <img class="img-fluid" src="{{ asset($value->image) }}" alt="Photo" width="120"> 
                @else
                  <img class="img-fluid" src="{{ asset('assets/images/sample/nopict.jpg') }}" alt="Photo" width="120">
                @endif
              </td>
              <td>{{ $value->caption }}</td>
              <td>
                <div class="btn-group btn-block">
                  @if (permissionCheck('show', '', 3)) <a href="{{ url('cms/gallery/'.$type.'/edit/'.$value->uuid) }}" class="btn btn-warning btn-sm">Edit</a> @endif
                  @if (permissionCheck('delete', '', 3)) <a href="{{ url('cms/gallery/'.$type.'/delete/'.$value->uuid) }}" class="btn btn-danger btn-sm">Hapus</a> @endif
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