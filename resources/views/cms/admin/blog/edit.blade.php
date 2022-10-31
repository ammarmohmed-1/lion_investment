@extends('cms.admin.index')

@section('title', 'Blogs')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Blogs / Edit</h2>
            <div>
                <a href="{{ route('blog.index') }}" class="btn btn-primary">Index Blogs</a>
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Create Blog</a>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="writer">Writer</label>
                        <input type="text" class="form-control" id="writer" placeholder="Writer"
                            value="{{ $blog->writer }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" value="1">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title"
                            value="{{ $blog->title }}">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"> {{ $blog->description }} </textarea>
                    </div>


                    <button type="button" onclick="update({{ $blog->id }})" class="btn btn-primary">Update Blog</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function update(id) {
            let blog = new FormData();
            blog.append('id', id)
            blog.append('writer', document.getElementById("writer").value)
            blog.append('image', document.getElementById("image").files[0])
            blog.append('title', document.getElementById("title").value)
            blog.append('description', document.getElementById("description").value)

            axios.post('/cms/admin/blog/edit', blog,{
                headers: {
                                'Content-Type': 'multipart/form-data'
                            }
            })
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
