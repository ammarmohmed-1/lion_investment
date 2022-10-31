@extends('cms.client.index')

@section('title', 'Referrals')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Client / {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <div class="container py-5">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row" style="margin-bottom: 2rem">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Referral Link</p>
                                        </div>
                                        <div class="col-sm-9 form-group" style="display:flex; justify-content: space-between;">
                                            <input autocomplete="off" class="form-control" style="display: block" type="text" id="referral_link"
                                            value="{{ auth()->user()->referral_link }}" disabled />

                                            <p id=""></p>
                                            <button onclick="copy()" class="btn btn-success"><i
                                                    class="fa-regular fa-clone"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Number Of Referral</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ count(auth()->user()->referrals) }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script>
        function copy() {
            // Get the text field
            var copyText = document.getElementById("referral_link");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }
    </script>

@endsection
