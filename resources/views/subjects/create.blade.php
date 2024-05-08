@extends('layouts.master')

@section('title', 'Add Subject')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Subjects</li>
<li class="breadcrumb-item active">Add Subject</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Subject</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('subjects.store') }}" method="post">
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
                      <label>Category</label>
                      <select class="form-control @error('subject_category_id') is-invalid @enderror" name="subject_category_id">
                        <option value="">No category</option>
                        @foreach ($categories as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>

@endSection