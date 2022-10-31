@extends('cms.client.index')

@section('title', 'Wallet')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Create a deposit request</h2>
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
                                    <option value="{{ $payment->id }}">{{ $payment->name }} > {{ $payment->account }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="amount">The amount you want to deposit</label>
                            <input type="number" class="form-control" id="amount"
                                placeholder="The amount you want to deposit">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="transfer_id">Transfer ID</label>
                            <input type="transfer_id" class="form-control" id="transfer_id" placeholder="Transfer ID">
                        </div>
                    </div>

                    <div style="
                    margin-bottom:1.5rem;">
                        <label for="image" class="form-label">Payment proof copy "Image"</label>
                        <input
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
                            class="form-control" type="file" id="image">
                    </div>
                    <div style="display: block; margin-bottom:1rem">
                        Transfer the amount before creating the order on our account : <span id="account"
                            style="color: red"> moath raed </span><br>
                    </div>
                    <button type="button" onclick="store()" class="btn btn-primary">Deposit Request</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="mt-5 d-flex justify-content-between">
            <h2 style="margin-left:10px">How to create an order</h2>
        </div>
        <div style="margin-left: 2rem; font-size: 20px">
            1. Choose one of the available deposit methods <br>
            2. Choose the amount you want to deposit <br>
            3. Type the payment process number that you sent to our wallet <br>
            4. Attach a picture of the payment process that you sent to our wallet <br>
            5. Request a deposit <br>
            6. The deposit request will be processed within 10 minutes <br>
        </div>

    @endsection

    @section('script')
        <script>
            function store() {
                let deposit = new FormData();
                deposit.append('payment_id', document.getElementById("payment_id").value)
                deposit.append('amount', document.getElementById("amount").value)
                deposit.append('transfer_id', document.getElementById("transfer_id").value)
                deposit.append('image', document.getElementById("image").files[0])

                axios.post('/cms/client/deposit', deposit)
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

        <script>
        const payment = document.getElementById('payment_id');
            function changeSpan(){
 
                const payment = document.getElementById('payment_id');
                var p=payment.options[payment.selectedIndex].text;
                const span = document.getElementById('account');
                span.textContent = p;
        
            } 
            changeSpan()
            payment.addEventListener('change',changeSpan)
            
        </script>
    @endsection
