@extends('layouts.master')

@section('title', 'Categories')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Categories List</h3>
                      @can('create-categories', \App\Models\Category::class)
                      <div class="float-right">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add Category</a>
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
                            <th>Parent Category</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $cat)
                            <tr>
                                <td>{{ $categories->firstItem() + $loop->index }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->parent ? $cat->parent->name : 'no parent' }}</td>
                                <td> 
                                    <div class="btn-group">

                                      @can('edit-categories', $cat)
                                      <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>                                          
                                        Edit</a>
                                      @endcan

                                      @can('delete-categories', $cat)
                                      <form action="{{ route('categories.destroy', $cat->id) }}" method="post">
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
                                    <td colspan="6">No categories found.</td>
                                </tr>                          
                            @endforelse                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $categories->links() }}
                    </div>
                  </div>
            </div>
        </div>
</section>

@endSection