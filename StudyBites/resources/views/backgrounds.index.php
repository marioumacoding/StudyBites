{{-- resources/views/backgrounds/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Select a Background</h3>
    <div class="row">
        @foreach($backgrounds as $background)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/' . $background->image_path) }}" class="card-img-top" alt="{{ $background->image_name }}">
                <div class="card-body">
                    <!-- Form to update the background -->
                    <form action="{{ route('background.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="background_name" value="{{ $background->image_name }}">
                        <button type="submit" class="btn btn-primary">Set as Background</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
