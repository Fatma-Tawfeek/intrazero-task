@extends('layouts.master')

@section('title', 'Subjects')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Subjects</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Subjects List</h3>
                      @can('create-subjects', \App\Models\Subject::class)
                      <div class="float-right">
                        <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add Subject</a>
                      </div>                        
                      @endcan
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                            <tr>
                                <td>{{ $subjects->firstItem() + $loop->index }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->category->name }}</td>
                                <td> 
                                    <div class="btn-group">

                                      @can('edit-subjects', $subject)
                                      <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>                                          
                                        Edit</a>
                                      @endcan

                                      @can('delete-subjects', $subject)
                                      <form action="{{ route('subjects.destroy', $subject->id) }}" method="post">
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
                                    <td colspan="6">No subjects found.</td>
                                </tr>                          
                            @endforelse                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $subjects->links() }}
                    </div>
                  </div>
            </div>
        </div>
</section>

@endSection