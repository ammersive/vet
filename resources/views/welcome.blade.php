@extends("app")

@section("content")
    <div class="list-group">

        @foreach (App\Models\Owner::all() as $owner)
            <a href="/models/{{ $owner->id }}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $owner->fullName() }}</h5>
                    <small>1 Day Ago</small>
                </div>
                <p class="mb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </a>
        @endforeach    

    </div>
@endsection