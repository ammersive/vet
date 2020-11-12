@extends("app")

@section("content")
    <div class="list-group">

        @foreach (App\Models\Owner::all() as $owner)
            @include("_partials/owner")
        @endforeach            

    </div>
@endsection