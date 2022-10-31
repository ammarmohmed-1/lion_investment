@extends('cms.admin.index')

@section('title', 'Blog')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Blog / Index</h2>
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Create Blog</a>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>image</td>
                            <td>title</td>
                            <td>Created Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>
                                    <img style="width: 3rem; hight:1rem;" src="{{ asset($blog->image->path)}}" class="img-fluid" alt="img-blog">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('blog.edit', $blog) }}" class="btn btn-primary"><i
                                                class="fa-regular fa-edit"></i></a>
                                        <a onclick="deletei({{ $blog->id }} , this)" type="button"
                                            class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        function deletei(id, ref) {
            axios.post('/cms/admin/blog/delete/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    ref.closest('tr').remove();
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
