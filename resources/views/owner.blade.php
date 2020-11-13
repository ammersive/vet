@extends("app")

@section("content")
    <div class="card">
        <h2 class="card-header">Owner</h2>
        <article class="card-body">
            {{ $owner->fullName() }}
        </article>        
        <article class="card-body">
            {{ $owner->fullAddress() }}
        </article>
        <article class="card-body">
            {{ $owner->formattedPhoneNumber() }}
        </article>
        <article class="card-body">
            {{ $owner->email }}
        </article>
    </div>
@endsection