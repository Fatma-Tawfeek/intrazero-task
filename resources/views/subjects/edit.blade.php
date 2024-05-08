@extends('layouts.master')

@section('title', 'Edit subjects')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Subjects</li>
<li class="breadcrumb-item active">Edit subjects</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit subjects</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('subjects.update', $subject->id) }}" method="post">
                  @csrf
                  @method('put')
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter name" value="{{ $subject->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="subject_category_id">
                        @foreach ($categories as $cat)
                          <option value="{{ $cat->id }}" {{ $cat->id == $subject->subject_category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                      </select>
                      @error('subject_category_id')
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