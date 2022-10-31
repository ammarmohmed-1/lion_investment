@extends('cms.client.index')

@section('title', 'Orders')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Investment Plans</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <form>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="first_name">Plan</label>
                            <select class="form-select" aria-label="Select Plan" id="plan">
                                @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}">{{ $plan->name }} / {{ $plan->min_price }}$ -
                                        {{ $plan->max_price }}$ / profit :  For {{ $plan->days }} days {{ $plan->profit }}%  every day</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="first_name">The amount you will pay in dollars</label>
                            <input type="first_name" class="form-control" id="price"
                                placeholder="The amount you will pay in dollars">
                        </div>
                    </div>
                    <button type="button" onclick="store()" class="btn btn-primary">Store Order</button>
                </form>
            </div>
        </div>
    </div>

    @endsection

    @section('script')
        <script>
            function store() {
                axios.post('/cms/client/order-client', {
                        plan_id: document.getElementById("plan").value,
                        price: document.getElementById("price").value,
                    })
                    .then(function(response) {
                        // handle success
                        console.log(response);
                        swal(response.data.title, response.data.details, response.data.icon);
                        window.location.href = '/cms/client/order-client'
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
