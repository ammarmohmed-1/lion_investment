@extends('cms.admin.index')

@section('title', 'Blogs')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Blogs / Create</h2>
            <a href="{{ route('blog.index') }}" class="btn btn-primary">Index Blogs</a>
        </div>

        <div class="details">
            <div class="recentOrders">
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="writer">Writer</label>
                        <input type="text" class="form-control" id="writer" placeholder="Writer">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>


                    <button type="button" onclick="store()" class="btn btn-primary">Store Blog</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function store() {
            let plog = new FormData();
            plog.append('writer' , document.getElementById("writer").value)
            plog.append('image' , document.getElementById("image").files[0])
            plog.append('title' , document.getElementById("title").value)
            plog.append('description' , document.getElementById("description").value)

            axios.post('/cms/admin/blog', plog)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    window.location.href = '/cms/admin/blog'
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    swal(error.response.data.title, error.response.data.details, error.response.data.icon);
                })
                .then(function() {
                    // always executed

                });
        }
    </script>
@endsection
