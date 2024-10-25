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
  <form action="{{ url()->current() }}" method="post" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="card-body row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="image">Gambar</label>
          <div class="col-sm-6">
            @if (isset($data->image))
              <img class="img-fluid" src="{{ asset($data->image) }}" alt="Photo" width="400"> 
            @else
              <img class="img-fluid" src="{{ asset('assets/images/sample/nopict.jpg') }}" alt="Photo" width="400">
            @endif
          </div>
          <br>
          <div class="col-sm-6">
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="title">Judul</label>
          <div class="input-group mb-3">
            <input class="form-control" name="title" placeholder="Judul" value="{{ $data->title }}" required>
          </div>
        </div>
        <div class="form-group">
          <label>Konten</label>
          <textarea id="summernote" rows="40" cols="6" name="content">
            {{ $data->content }}
          </textarea>
        </div>
        <div class="form-group">
          <label for="name">Tags</label>
          <div class="input-group mb-3">
            <code>beri tanda koma untuk memisahkan tag. contoh: sekolah,indonesia,ppdb</code>
          </div>
          <div class="input-group mb-3">
            <textarea class="form-control" name="tags" placeholder="Tags" required>{{ $data->tags }}</textarea>
          </div>
        </div>
        <div class="form-group clearfix">
          <label for="name">Status</label>
          <div class="input-group mb-3">
            <div class="icheck-danger d-inline">
              <input type="radio" id="{{ 'is_active_false' }}" value="0" name="is_active" {{ $data->is_active !== 1 ? 'checked' : '' }} >
              <label for="{{ 'is_active_false' }}">
                Tidak Aktif
              </label>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="icheck-primary d-inline">
              <input type="radio" id="{{ 'is_active_true' }}" value="1" name="is_active" {{ $data->is_active === 1 ? 'checked' : '' }} >
              <label for="{{ 'is_active_true' }}">
                Aktif
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ url('blog/news') }}" onclick="return confirm('Anda yakin mau kembali?')" class="btn btn-success">Kembali</a>
    </div>
  </form>
</div>
 
@endsection

@push('extra-scripts')
<script src="{{asset('assets/ui/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('#summernote').summernote(
    {
      height: 300,
    });
  });
</script>
@endpush