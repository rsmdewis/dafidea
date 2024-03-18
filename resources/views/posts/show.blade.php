<!-- resources/views/posts/show.blade.php -->
@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">{{ $post->title }}</h4>
                <!-- <p>Author: {{ $post->user->name }}</p> -->
            </div>
            <div class="card-body">
                <p>{{ $post->content }}</p>
                
            </div>
            
        </div>
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mt-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Komentar</h5>
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="card-title text-primary" style="font-size: 14px;">{{ $comment->email }}</h6>
                            <p class="card-text" style="font-size: 14px;">{{ $comment->content }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- Tampilkan komentar di sini -->