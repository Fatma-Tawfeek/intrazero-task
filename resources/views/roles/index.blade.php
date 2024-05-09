@extends('layouts.master')

@section('title', 'Roles')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Roles</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Roles List</h3>
                      @can('create-roles', \App\Models\Role::class)
                      <div class="float-right">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary">Add Role</a>
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
                            <th>Permissions</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <td>{{ $roles->firstItem() + $loop->index }}</td>
                                <td>{{ $role->name }}</td>
                                <td style="width: 800px">
                                  @forelse ($role->permissions as $permission)
                                    <span class="badge badge-primary">{{ $permission->name }}</span>
                                  @empty
                                    <span class="badge badge-secondary">No permissions</span>
                                  @endforelse
                                </td>
                                <td> 
                                    <div class="btn-group">

                                      @can('edit-roles', $role)
                                      <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>                                          
                                        Edit</a>
                                      @endcan

                                      @can('delete-roles', $role)
                                      <form action="{{ route('roles.destroy', $role->id) }}" method="post">
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
                                    <td colspan="6">No roles found.</td>
                                </tr>                          
                            @endforelse                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $roles->links() }}
                    </div>
                  </div>
            </div>
        </div>
</section>

@endSection