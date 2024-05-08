@extends('layouts.master')

@section('title', 'diploma')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Diplomas</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Diplomas List</h3>
                      @can('create-diplomas', \App\Models\Diploma::class)
                      <div class="float-right">
                        <a href="{{ route('diplomas.create') }}" class="btn btn-primary">Add Diploma</a>
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
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($diplomas as $diploma)
                            <tr>
                                <td>{{ $diplomas->firstItem() + $loop->index }}</td>
                                <td>{{ $diploma->name }}</td>
                                <td> 
                                    <div class="btn-group">

                                      @can('edit-diplomas', $diploma)
                                      <a href="{{ route('diplomas.edit', $diploma->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>                                          
                                        Edit</a>
                                      @endcan

                                      @can('delete-diplomas', $diploma)
                                      <form action="{{ route('diplomas.destroy', $diploma->id) }}" method="post">
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
                                    <td colspan="6">No diplomas found.</td>
                                </tr>                          
                            @endforelse                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $diplomas->links() }}
                    </div>
                  </div>
            </div>
        </div>
</section>

@endSection