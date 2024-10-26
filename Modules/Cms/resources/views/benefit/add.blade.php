@extends('layouts.main', ['title' => $title ])

@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-ban"></i> Gagal Validasi!</h5>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</div>
@endif

@if (session('success'))
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
  {{ session('success') }}
  </div>
@endif

@if (session('failed'))
  <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
  {{ session('failed') }}
  </div>
@endif
 
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Form {{ $title }}</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="{{ url()->current() }}" method="post" autocomplete="off">
    @csrf
    <div class="card-body row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="title">Judul</label>
          <div class="input-group mb-3">
            <input class="form-control" name="title" placeholder="Judul" value="{{ old('title') }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="name">Point Benefit</label>
          <div class="input-group mb-3">
            <textarea class="form-control" name="point" placeholder="Deskripsi" required>{{ old('point') }}</textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="sequence">Urutan</label>
          <div class="input-group mb-3">
            <input type="number" class="form-control moneyform" name="sequence" placeholder="0" value="{{ old('sequence') }}" required>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ url('cms/benefit') }}" onclick="return confirm('Anda yakin mau kembali?')" class="btn btn-success">Kembali</a>
    </div>
  </form>
</div>
 
@endsection

