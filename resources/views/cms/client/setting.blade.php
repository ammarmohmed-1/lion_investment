@extends('cms.client.index')

@section('title', 'Setting')


@section('style')

@endsection

@section('content')
    <div class="container">
        <div class="header-page">
            <h2>Client / Setting</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <form>
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="password">Current Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="password">New Password Confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm New Password">
                        </div>
                    </div>

                    <button type="button" onclick="resetPassword({{ auth()->user()->id }})" class="btn btn-primary">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
