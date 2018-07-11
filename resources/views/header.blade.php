@section('navbar')
    <ul class="nav justify-content-end demo-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/profile') }}">Edit Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/message') }}">Message</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
        </li>        
    </ul>
@endsection