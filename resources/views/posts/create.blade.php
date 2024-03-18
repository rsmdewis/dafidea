
@extends('layout.main')



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Berita Baru</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judul Berita</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Isi:</label>
                            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                        </div>
                        <!-- Tambahkan input untuk informasi berita lainnya sesuai kebutuhan -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection