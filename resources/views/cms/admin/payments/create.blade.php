@extends('cms.admin.index')

@section('title', 'Payments')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Payments / Create</h2>
            <a href="{{ route('payment.index') }}" class="btn btn-primary">Index Payments</a>
        </div>

        <div class="details">
            <div class="recentOrders">
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="writer">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image">
                    </div>

                    <div class="form-group">
                        <label for="account_id">Account Id</label>
                        <input type="text" class="form-control" id="account_id" placeholder="Account Id">
                    </div>


                    <button type="button" onclick="store()" class="btn btn-primary">Store Payment</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function store() {
            let payment = new FormData();
            payment.append('name' , document.getElementById("name").value)
            payment.append('image' , document.getElementById("image").files[0])
            payment.append('account' , document.getElementById("account_id").value)

            axios.post('/cms/admin/payment', payment)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    window.location.href = '/cms/admin/payment'
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
