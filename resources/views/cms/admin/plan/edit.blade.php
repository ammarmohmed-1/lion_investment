@extends('cms.admin.index')

@section('title', 'Plans')

@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Plans / Edit</h2>
            <div>
                <a href="{{ route('plan.index') }}" class="btn btn-primary">Index Plan</a>
                <a href="{{ route('plan.create') }}" class="btn btn-primary">Create Plan</a>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <form>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name" value="{{ $plan->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="profit">profit</label>
                            <input type="number" class="form-control" id="profit" placeholder="Profit" value="{{ $plan->profit }}">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="profit">Days</label>
                        <input type="number" class="form-control" id="days" placeholder="Days">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="min_price">Min Price</label>
                            <input type="number" class="form-control" id="min_price" placeholder="Min Price" value="{{ $plan->min_price }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="max_price">Max Price</label>
                            <input type="number" class="form-control" id="max_price" placeholder="Max Price" value="{{ $plan->max_price }}">
                        </div>
                    </div>

                    <button type="button" onclick="update({{$plan->id}})" class="btn btn-primary">Update Plan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function update(id) {
            axios.post('/cms/admin/plan/' + id, {
                data:{
                name: document.getElementById("name").value,
                min_price: document.getElementById("min_price").value,
                max_price: document.getElementById("max_price").value,
                profit: document.getElementById("profit").value,
                days: document.getElementById("days").value,
                },
                _method:'patch'})
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    window.location.href = '/cms/admin/plan'
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
