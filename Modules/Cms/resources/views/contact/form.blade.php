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
  <form action="{{ url()->current() }}" method="post">
    @csrf
    @foreach ($data as $key => $item)
      <input type="hidden" id="id" name="id[]" value={{ $item->id }}>
      <div class="card-body">
        <h2 for="name">{{ $item->element }}</h2>
        <div class="form-group">
          <label for="name">Text</label>
          <div class="input-group mb-3">
            <input class="form-control" name="text[]" placeholder="Text" value="{{ isset($item->text) ? $item->text : '' }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="name">Link</label>
          <div class="input-group mb-3">
            <input class="form-control" name="link[]" placeholder="Link" value="{{ isset($item->link) ? $item->link : '' }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="sequence">Urutan</label>
          <div class="input-group mb-3">
            <input type="number" class="form-control moneyform" name="sequence[]" placeholder="0" value="{{ isset($item->sequence) ? $item->sequence : '' }}"required>
          </div>
        </div>
        <div class="form-group clearfix">
          <label for="name">Status</label>
          <div class="input-group mb-3">
            <div class="icheck-danger d-inline">
              <input type="radio" id="{{ 'is_active_false'.$item->id }}" value="0" name="is_active[{{ $key }}]" {{ $item->is_active !== 1 ? 'checked' : '' }} >
              <label for="{{ 'is_active_false'.$item->id }}">
                Tidak Aktif
              </label>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="icheck-primary d-inline">
              <input type="radio" id="{{ 'is_active_true'.$item->id }}" value="1" name="is_active[{{ $key }}]" {{ $item->is_active === 1 ? 'checked' : '' }} >
              <label for="{{ 'is_active_true'.$item->id }}">
                Aktif
              </label>
            </div>
          </div>
        </div>
      </div>
      <hr>
    @endforeach
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
 
@endsection
