@extends('cms.admin.index')

@section('title', 'Contact Us')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Contact Us / Index</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Title</td>
                            <td>Created Date</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contact_uss as $contact_us)
                            <tr>
                                <td>{{ $contact_us->id }}</td>
                                <td>{{ $contact_us->name }}</td>
                                <td>{{ $contact_us->email }}</td>
                                <td>{{ $contact_us->title }}</td>
                                <td>{{ $contact_us->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('contact.show' , $contact_us->id)}}"class="btn btn-success"><i class="fa-regular fa-eye"></i></a>
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

@endsection
