<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                @include('layout.navbar')
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800 font-weight-bold text-primary">Daftar Berita</h1>

                    <div id="postList" class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="list-group">
                                        <post-item v-for="post in posts" :key="post.id" :post="post"></post-item>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            @include('layout.footer')

        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Vue.js script -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <!-- Axios for HTTP requests -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Vue component for post item -->
    <script type="text/x-template" id="post-item-template">
        <a :href="'/komentar/' + post.id" class="list-group-item list-group-item-action">@{{ post.title }}</a>
    </script>

    <!-- Vue component for post item -->
    <script>
        Vue.component('post-item', {
            props: ['post'],
            template: '#post-item-template'
        });

        new Vue({
            el: '#postList',
            data: {
                posts: @json($posts) // Initialize posts array with PHP data
            }
        });
    </script>


</body>

</html>
