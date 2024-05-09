@extends('layouts.master')

@section('title', 'Study Plans')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Study Plans</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Study Plans List</h3>
                      @can('create-study-plans', \App\Models\StudyPlan::class)
                      <div class="float-right">
                        <a href="{{ route('study-plans.create') }}" class="btn btn-primary">Add Study Plan</a>
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
                            <th>Diplomas</th>
                            <th>Courses</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($studyPlans as $studyPlan)
                            <tr>
                                <td>{{ $studyPlans->firstItem() + $loop->index }}</td>
                                <td>{{ $studyPlan->name }}</td>
                                </td>
                                <td>
                                  @forelse ($studyPlan->diplomas as $diploma)
                                    <span class="badge badge-primary">{{ $diploma->name }}</span>                                    
                                  @empty
                                    <span class="badge badge-secondary">No diplomas</span>                                    
                                  @endforelse
                                </td>
                                <td>
                                  @forelse ($studyPlan->courses as $course)
                                    <span class="badge badge-primary">{{ $course->name }}</span>
                                  @empty
                                    <span class="badge badge-secondary">No courses</span>
                                  @endforelse
                                <td> 
                                    <div class="btn-group">

                                      @can('edit-study-plans', $studyPlan)
                                      <a href="{{ route('study-plans.edit', $studyPlan->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>                                          
                                        Edit</a>
                                      @endcan

                                      @can('delete-study-plans', $studyPlan)
                                      <form action="{{ route('study-plans.destroy', $studyPlan->id) }}" method="post">
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
                                    <td colspan="6">No study plans found.</td>
                                </tr>                          
                            @endforelse                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $studyPlans->links() }}
                    </div>
                  </div>
            </div>
        </div>
</section>

@endSection