   <!-- Responsive navbar-->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand " href="#!"><img height="60" width="60" class="img-fluid" src="{{asset('public/main/images/neep.png')}}" alt=""> <strong>NRCP Expert Engagement Program</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ request()->is('main*') ? 'active' : '' }}" href="{{ route('main') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#neepGuidelines">Guidelines</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('contact_us*') ? 'active' : '' }}" href="{{ route('contact_us') }}">Contact</a></li>

                <a class="nav-link" href="#" data-toggle="modal" data-target="#beforeSignup">Sign Up</a>
                <li class="nav-item"><a class="nav-link" href="http://10.10.128.19/skms/main/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>