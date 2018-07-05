@extends('layouts.layout')

@section('navbar')
    <ul class="nav justify-content-end demo-nav">
        <li class="nav-item">
            <a class="nav-link" href="/profile">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/message">Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
        </li>
    </ul>
@endsection

@section('content')
<div class="container login-content">
    <div class="row justify-content-center">
        <div class="col-4">
            <h1> Messages </h1>
            <form id="messages-form" method="POST" action="{{ action('CustomerController@saveMessage') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputSubject1">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <script>                
                $("#messages-form").validate({
                    normalizer: function(value) {
                        return $.trim(value);
                    },
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        subject: {
                            required: true
                        },
                        message: {
                            required: true
                        }
                    },
                    messages: {
                        email: {
                            required: "Please enter email address.",
                            email: "Please enter a valid email address."
                        },
                        subject: {
                            required: "Please enter subject.",
                        },
                        message: {
                            required: "Please enter message.",
                        }
                        
                    }
                });                               
            </script>
        </div>
    </div>
</div>
@endsection