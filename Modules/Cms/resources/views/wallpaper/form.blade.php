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
  <form action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="id" name="id" value={{ $data->id }}>
    <div class="card-body">
      <div class="form-group">
        <label for="image">Gambar</label>
        {{-- <img class="img-fluid" src="{{asset('assets/images/sample/nopict.jpg')}}" alt="Photo"> --}}
        <div class="col-sm-6">
          @if (isset($data->wallpaper_image))
            <img class="img-fluid" src="{{ asset($data->wallpaper_image) }}" alt="Photo" width="400"> 
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
        <label>Deskripsi</label>
        <textarea id="summernote" rows="40" cols="6" name="content">
          {{ isset($data->wallpaper_text) ? $data->wallpaper_text : '' }}
        </textarea>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ url('usermanagement/role') }}" onclick="return confirm('Anda yakin mau kembali?')" class="btn btn-success">Kembali</a>
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