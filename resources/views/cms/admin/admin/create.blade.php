@extends('cms.admin.index')

@section('title', 'Admins')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Admins / Create</h2>
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Index Admin</a>
        </div>

        <div class="details">
            <div class="recentOrders">
                <form>
                    @csrf
                    <div class="form">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="first_name" class="form-control" id="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="last_name" class="form-control" id="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                    </div>

                    <button type="button" onclick="store()" class="btn btn-primary">Store Admin</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function store() {
            axios.post('/cms/admin/admin', {
                    first_name: document.getElementById("first_name").value,
                    last_name: document.getElementById("last_name").value,
                    email: document.getElementById("email").value,
                    password: document.getElementById("password").value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    window.location.href = '/cms/admin/admin'
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
