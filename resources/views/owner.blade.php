@extends("app")

@section("content")
    <div class="card">
        <h2 class="card-header">Owner</h2>
        <article class="card-body">
            {{ $owner->fullName() }}
        </article>
    </div>
@endsection