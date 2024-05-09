@extends('layouts.master')

@section('title', 'Edit Study Plan')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Study Plans</li>
<li class="breadcrumb-item active">Edit Study Plan</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Study Plan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('study-plans.update', $studyPlan->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="{{ $studyPlan->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Diplomas</label> <br>
                      <select class="js-example-basic-multiple form-control @error('diploma_id') is-invalid @enderror" name="diploma_id[]" multiple="multiple">
                        @foreach ($diplomas as $diploma)
                          <option value="{{ $diploma->id }}" {{ in_array($diploma->id, $studyPlan->diplomas->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $diploma->name }}</option>
                        @endforeach
                      </select>
                      @error('diploma_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div> 
                    <div class="form-group">
                      <label for="">Courses</label> <br>
                      <select class="js-example-basic-multiple form-control @error('course_id') is-invalid @enderror" name="course_id[]" multiple="multiple">
                        @foreach ($courses as $course)
                          <option value="{{ $course->id }}" {{ in_array($course->id, $studyPlan->courses->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                      </select>
                      @error('course_id')
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