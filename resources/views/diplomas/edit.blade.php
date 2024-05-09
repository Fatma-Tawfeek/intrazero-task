@extends('layouts.master')

@section('title', 'Edit diploma')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">diplomas</li>
<li class="breadcrumb-item active">Edit diploma</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit diploma</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('diplomas.update', $diploma->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="{{ $diploma->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Subjects</label> <br>
                      <select class="js-example-basic-multiple form-control @error('subject_id') is-invalid @enderror" name="subject_id[]" multiple="multiple">
                        @foreach ($subjects as $subject)
                          <option value="{{ $subject->id }}" {{ in_array($subject->id, $diploma->subjects->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $subject->name }}</option>
                        @endforeach
                      </select>
                      @error('subject_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>        
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>

@endSection

@push('scripts')
  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
  </script>
  
@endpush

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  
@endpush