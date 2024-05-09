@extends('layouts.master')

@section('title', 'Users')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Users</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Users List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $users->firstItem() + $loop->index }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                 <span class="badge badge-success">{{ $user->role->name }}</span> 
                                </td>
                                <td> 
                                    <div class="btn-group">

                                      @can('edit-users', $user)
                                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-2">
                                        <i class="fas fa-edit"></i>                                          
                                        Edit Role</a>
                                      @endcan
                                    </div>
                                </td>
                            </tr>      
                            @empty
                                <tr>
                                    <td colspan="6">No users found.</td>
                                </tr>                          
                            @endforelse                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{ $users->links() }}
                    </div>
                  </div>
            </div>
        </div>
</section>

@endSection