@extends('cms.client.index')

@section('title', 'Wallet')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Create a withdrawal request</h2>
        </div>
        <div class="details">
            <div class="recentOrders">
                <form>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="first_name">Payment Method</label>
                            <select
                                style=" font-size: 16px;
                            line-height: 28px;
                            padding: 8px 16px;
                            width: 100%;
                            min-height: 44px;
                            border: unset;
                            border-radius: 4px;
                            outline-color: rgb(84 105 212 / 0.5);
                            background-color: rgb(255, 255, 255);
                            box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                              rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                              rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                              rgba(60, 66, 87, 0.16) 0px 0px 0px 1px,
                              rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                              rgba(0, 0, 0, 0) 0px 0px 0px 0px,
                              rgba(0, 0, 0, 0) 0px 0px 0px 0px;"
                                aria-label="Select Plan" id="payment_id">
                                @foreach ($payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="amount">The amount you want to withdraw</label>
                            <input type="number" class="form-control" id="amount"
                                placeholder="The amount you want to withdraw">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="account">Your account ID</label>
                            <input type="text" class="form-control" id="account" placeholder="Your account ID">
                        </div>
                    </div>

                    <button type="button" onclick="store()" class="btn btn-primary">Withdrawal Request</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function store() {
            axios.post('/cms/client/withdrawal', {
                    'payment_id': document.getElementById("payment_id").value,
                    'amount': document.getElementById("amount").value,
                    'account': document.getElementById("account").value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    window.location.href = '/cms/client/wallet'
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
