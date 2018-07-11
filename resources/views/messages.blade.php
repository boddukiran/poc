@extends('layouts.layout')

@include('header')

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