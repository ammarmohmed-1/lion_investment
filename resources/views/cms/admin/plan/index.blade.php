@extends('cms.admin.index')

@section('title', 'Plans')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Plans / Index</h2>
            <a href="{{ route('plan.create') }}" class="btn btn-primary">Create Plan</a>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Profit</td>
                            <td>Days</td>
                            <td>Min Price</td>
                            <td>Max Price</td>
                            <td>Created Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <td>{{ $plan->id }}</td>
                                <td>{{ $plan->name }}</td>
                                <td>{{ $plan->profit }}%</td>
                                <td>{{ $plan->days }} days</td>
                                <td>{{ $plan->min_price }}</td>
                                <td>{{ $plan->max_price }}</td>
                                <td>{{ $plan->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('plan.edit', $plan) }}" class="btn btn-primary"><i
                                                class="fa-regular fa-edit"></i></a>
                                        <a onclick="deletei({{$plan->id}} , this)" type="button" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></a>
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
            axios.post('/cms/admin/plan/delete/' + id)
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
