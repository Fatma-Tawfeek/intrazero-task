@extends('layouts.master')

@section('title', 'Edit Course')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Courses</li>
<li class="breadcrumb-item active">Edit Course</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Course</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="{{ $course->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description">{{ $course->description }}</textarea>
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
                          <option value="{{ $subject->id }}" {{ $subject->id == $course->subject_id ? 'selected' : '' }}>{{ $subject->name }}</option>
                        @endforeach
                      </select>
                      @error('subject_id')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label>Image</label> <br>
                      <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" width="50" height="50" class="mb-2 thumbnail">
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
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>

@endSection