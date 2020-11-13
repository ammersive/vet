@extends("app")

@section("content")
    <div class="list-group">

        @foreach ($owners as $owner)
            @include("_partials/owner")
        @endforeach            

    </div>
@endsection