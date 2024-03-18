@extends('layout.main')

@section('title', 'Dashboard')
@section('content')
<div class="col-lg-3 col-6">
    <div class="card bg-primary text-white shadow">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Berita</div>
                    <div class="h5 mb-0 font-weight-bold">{{ $totalPosts }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-newspaper fa-2x text-white"></i>
                </div>
            </div>
        </div>
        <div class="card-footer bg-primary text-white clearfix small z-1">
            <a href="{{ route('posts.index') }}" class="text-white float-left">More info</a>
            <span class="float-right">
                <i class="fas fa-arrow-circle-right"></i>
            </span>
        </div>
    </div>
</div>


@endsection