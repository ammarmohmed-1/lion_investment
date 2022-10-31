@extends('cms.admin.index')

@section('title', 'Password recovery requests')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Password recovery requests / {{ $forget->email }}</h2>
            <div>
                <a type="button" onclick="updatePassword({{$forget->id}})" class="btn btn-primary" style="margin-right: 4rem">Request
                    Accept</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Client Name</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">
                    {{ $client->first_name . $client->last_name }}
                </p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Client Email</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">
                    {{ $client->email }}
                </p>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">The password it needs</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">
                    {{ $forget->password }}
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Status</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $forget->status_text }}</p>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('script')
    <script>
        function updatePassword(id) {
            axios.post('/cms/admin/forget/approve/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    // window.location.href = '/cms/admin/client'
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
