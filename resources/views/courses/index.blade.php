@extends('layouts.master')

@section('title', 'Courses')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Courses</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Courses List</h3>
                      @can('create-courses', \App\Models\Course::class)
                      <div class="float-right">
                        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
                      </div>                        
                      @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Subject</th>
                            <th>Tutor</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                            <tr>
                                <td>{{ $courses->firstItem() + $loop->index }}</td>
                                <td><img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->name }}" width="50" height="50" style="border-radius: 50%"></td>
                                <td>{{ $course->name }}</td>
                                <td>{{ Str::limit($course->description, 50) }}</td>
                                <td>{{ $course->subject->name }}</td>
                                <td>{{ $course->tutor->name }}</td>
                                <td> 
                                    <div class="btn-group">
                                      @can('edit-courses', $course)
                                      <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>                                          
                                        Edit</a>
                                      @endcan

                                      @can('delete-courses', $course)
                                      <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                          <i class="fas fa-trash"></i> 
                                          Delete</button>
                                      </form>
                                      @endcan
                                    </div>
                                </td>
                            </tr>      
                            @empty
                                <tr>
                                    <td colspan="6">No courses found.</td>
                                </tr>                          
                            @endforelse                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $courses->links() }}
                    </div>
                  </div>
            </div>
        </div>
</section>

@endSection