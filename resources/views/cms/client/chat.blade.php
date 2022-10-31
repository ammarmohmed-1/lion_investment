@extends('cms.client.index')

@section('title', 'Chat')

@section('style')

@endsection

@section('content')

    <div class="container">
        <div class="header-page">
            <h2>Chat</h2>
        </div>


        <div class="details" style="margin-bottom: 1.5rem;">
            <div class="recentOrders">
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="writer" style="margin-bottom: 0.75rem;">Message</label>
                        <input type="text" style="margin-top: 0.75rem" class="form-control" id="message"
                            placeholder="Message">
                    </div>
                    <button type="button" onclick="store()" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <div class="container">
                    @foreach ($messages as $message)
                        <div style="margin-top: 1rem; margin-bottom: 1rem; display:block;">
                            <div style="display: flex; justify-content: space-between;">
                                <p class="mb-0" @if ($message->admin_id !== null) style="color:blue;" @endif>
                                    @if ($message->admin_id !== null) Admin @else You @endif :  {{ $message->message }}</p>
                                <p style="margin-right: 3rem" class="text-muted mb-0">{{ $message->created_at }}</p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function store() {
            axios.post('/cms/client/message', {
                    message: document.getElementById("message").value,
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    swal(response.data.title, response.data.details, response.data.icon);
                    window.location.href = '/cms/client/chat'
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
