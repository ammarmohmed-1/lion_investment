@extends('cms.admin.index')

@section('title', 'clients')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Clients / Index</h2>
            <a href="{{ route('client.create') }}" class="btn btn-primary">Create Client</a>
        </div>

        <div class="details">
            <div class="recentOrders">
              @php $i = 1; @endphp
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>email</td>
                            <td>status</td>
                            <td>created date</td>
                            <td>actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $client->first_name . $client->last_name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->status_text }}</td>
                                <td>{{ $client->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('client.edit', $client) }}" class="btn btn-primary"><i
                                                class="fa-regular fa-edit"></i></a>
                                        <a onclick="deletei({{$client->id}} , this)" type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
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
        function deletei(id , ref) {
            axios.post(`/cms/admin/client/delete/${id}`)
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
