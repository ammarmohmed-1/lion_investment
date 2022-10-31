@extends('cms.admin.index')

@section('title', 'Orders')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Password recovery requests / Index</h2>
        </div>

        <div class="details">
            <div class="recentOrders">
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Client Email</td>
                            <td>The password it needs</td>
                            <td>Status</td>
                            <td>created date</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($forgets as $forget)
                            <tr>
                                <td>{{ $forget->id }}</td>
                                <td>{{ $forget->email }}</td>
                                <td>{{ $forget->password }}</td>
                                <td style="color: @if($forget->status) green; @else red; @endif" >{{ $forget->status_text }}</td>
                                <td>{{ $forget->created_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="action group">
                                        <a href="{{ route('forget.show', $forget) }}" class="btn btn-primary"><i
                                                class="fa-regular fa-eye"></i></a>
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
