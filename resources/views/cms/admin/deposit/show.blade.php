@extends('cms.admin.index')

@section('title', 'Deposit')

@section('style')

@endsection

@section('content')
    <div class="container" style="right: 4rem;">
        <div class="header-page">
            <h2>Deposit / {{ $deposit->id }}</h2>
            <div>
                <a type="button" onclick="accept({{$deposit->id}})" class="btn btn-primary">Accepting the deposit request</a>
                <a type="button" onclick="deletei({{$deposit->id}})" class="btn btn-primary">Delete this Deposit Request</a>
            </div>
        </div>
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

            <img style="width: 100%; hight:auto;" src="{{ URL::to('/').$deposit->image->path }}" class="img-fluid"
                alt="img-payment">

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">deposit Id</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $deposit->id }}</p>
                </div>
            </div>
            <hr>
            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">deposit Date & Time</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $deposit->created_at }}</p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Client</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">id : {{ $deposit->client->id }} /
                        {{ $deposit->client->first_name . ' ' . $deposit->client->last_name }}</p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Payment Method</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">id : {{ $deposit->payment->id }} /
                        {{ $deposit->payment->name }}</p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Amount</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">
                        {{ $deposit->amount }} $
                    </p>
                </div>
            </div>
            <hr>

            <div class="row" style="display: flex; justify-content: space-between; margin:1rem; margin-right:4rem;">
                <div class="col-sm-3">
                    <p class="mb-0">Status</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $deposit->status_text }}</p>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection

@section('script')

    <script>
        function deletei(id, ref) {
            axios.post('/cms/admin/deposit/delete/' + id)
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
            axios.post('/cms/admin/deposit/update/' + id)
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
