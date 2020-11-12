@extends("app")

@section("nav")
    <a class="navbar-brand" href="/">Home</a>
    <a class="navbar-brand" href="/">About</a>
    <a class="navbar-brand" href="/">Pet Tips</a>
    <a class="navbar-brand" href="/">News</a>
    <a class="navbar-brand" href="/">Contact Us</a>
    <a class="navbar-brand" href="/">Log In</a>
@endsection

@section("content")
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Welcome to Happy Paws Vets Practice</h5>
                <small>1 Day Ago</small>
            </div>
            <p class="mb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
        </a>
    </div>
@endsection  

@section("footer")
    <span>&#128018</span>
    <span>&#129421</span>
    <span>&#128054</span>
    <span>&#128008</span>
    <span>&#129427</span>
    <span>&copy; Happy Paws Vets 2020</span>
@endsection