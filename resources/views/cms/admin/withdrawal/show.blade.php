@extends('cms.admin.index')

@section('title', 'Withdrawal')

@section('style')

@endsection

@section('content')
    <div class="container" style="right: 4rem;">
        <div class="header-page">
            <h2>Withdrawal / {{ $withdrawal->id }}</h2>
            <div>
                <a type="button" onclick="accept({{$withdrawal->id}})" class="btn btn-primary">Accepting the Withdrawal request</a>
                <a type="button" onclick="deletei({{$withdrawal->id}})" class="btn btn-primary">Delete this Withdrawal Request</a>
            </div>
        </div>
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Withdrawal Id</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $withdrawal->id }}</p>
                </div>
            </div>
            <hr>
            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Withdrawal Date & Time</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $withdrawal->created_at }}</p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Client</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">id : {{ $withdrawal->client->id }} /
                        {{ $withdrawal->client->first_name . ' ' . $withdrawal->client->last_name }}</p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Payment Method</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $withdrawal->payment->name }}</p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Client Account Id <br> "The client ID on the payment method that you will send the money to"</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $withdrawal->account }}</p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Amount</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">
                        {{ $withdrawal->amount }} $
                    </p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Status</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $withdrawal->status_text }}</p>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection

@section('script')

    <script>
        function deletei(id, ref) {
            axios.post('/cms/admin/withdrawal/delete/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
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

        function accept(id) {
            axios.post('/cms/admin/withdrawal/update/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
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
