@extends('cms.admin.index')

@section('title', 'Payments')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Payments / Index</h2>
            <a href="{{ route('payment.create') }}" class="btn btn-primary">Create Payment</a>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>iamge</td>
                            <td>name</td>
                            <td>account</td>
                            <td>Created Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>
                                    <img style="width: 3rem; hight:1rem;" src="{{ asset($payment->image->path)}}" class="img-fluid" alt="img-payment">
                                </td>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->account }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('payment.edit', $payment) }}" class="btn btn-primary"><i
                                                class="fa-regular fa-edit"></i></a>
                                        <a onclick="deletei({{ $payment->id }} , this)" type="button"
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
            axios.post('/cms/admin/payment/delete/' + id)
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
