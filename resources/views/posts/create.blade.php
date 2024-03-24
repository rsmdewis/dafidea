@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-md-12" id="app">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Berita Baru</h6>
                </div>
                <div class="card-body">
                    <form @submit.prevent="submitForm">
                        <div class="form-group">
                            <label for="title">Judul Berita</label>
                            <input type="text" class="form-control" v-model="postData.title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Isi:</label>
                            <textarea class="form-control" v-model="postData.content" rows="5"></textarea>
                        </div>
                        <!-- Tambahkan input untuk informasi berita lainnya sesuai kebutuhan -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                postData: {
                    title: '',
                    content: ''
                }
            },
            methods: {
                submitForm: function () {
                    // Kirim data menggunakan AJAX atau sesuai dengan kebutuhan aplikasi Anda
                    console.log(this.postData);
                    // Contoh menggunakan axios untuk mengirim data
                    axios.post('{{ route('posts.store') }}', this.postData)
                        .then(function (response) {
                            console.log(response);
                            // Handle respons sesuai dengan kebutuhan Anda
                            window.location.href = '{{ route('posts.index') }}';
                        })
                        .catch(function (error) {
                            console.error(error);
                            // Handle error sesuai dengan kebutuhan Anda
                        });
                }
            }
        });
    </script>
@endsection
