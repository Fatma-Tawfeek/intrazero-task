@extends('layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Dashboard</li>
@endsection
@section('content')
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $coursesCount }}</h3>

              <p>Courses</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-graduation-cap"></i>
            </div>
            <a href="{{ route('courses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $diplomasCount }}</h3>

              <p>Diplomas</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-certificate"></i>
            </div>
            <a href="{{ route('diplomas.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $studyPlansCount }}</h3>

              <p>Study Plans</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-copy"></i>
            </div>
            <a href="{{ route('study-plans.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $tutorsCount }}</h3>

              <p>Tutors</p>
            </div>
            <div class="icon">
              <i class="nav-icon fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
@endsection