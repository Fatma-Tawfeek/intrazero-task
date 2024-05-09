@extends('layouts.master')

@section('title', 'Add Role')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Roles</li>
<li class="breadcrumb-item active">Add Role</li>
@endSection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Role</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('roles.store') }}" method="post">
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
                      <label>Permissions</label> <br>
                      @foreach ($permissions as $key => $permission)
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="permission-{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}">
                          <label for="permission-{{ $permission->id }}">
                            {{ $permission->name }}
                          </label> 
                          @if(($key + 1) % 4 == 0)
                          <br>
                          @endif
                        </div>                        
                      @endforeach
                      @error('permissions')
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