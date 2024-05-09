@extends('layouts.master')

@section('title', 'Add Course')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Courses</li>
<li class="breadcrumb-item active">Add Course</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Course</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name">
                      @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description"></textarea>
                      @error('description')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Subject</label>
                      <select class="form-control @error('subject_id') is-invalid @enderror" onchange="this.setCustomValidity('')" name="subject_id">
                        <option value="">No subject</option>
                        @foreach ($subjects as $subject)
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                      </select>
                      @error('subject_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                      @error('image')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>

@endSection