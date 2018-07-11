@section('navbar')
<ul class="nav justify-content-end demo-nav">
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('messages') }}">Messages</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/adminlogout') }}">Logout</a>
    </li>     
</ul>
@endsection