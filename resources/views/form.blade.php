@extends('_template')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <strong>Add Link for Price Monitor</strong>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! session('message') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form method="POST" action="{{ url('/add') }}">
                    @csrf

                    <div class="form-group">
                        <label for="url">Fabelio Page URL</label> <small id="urlHelp" class="text-muted">(https://fabelio.com/ip/xxx)</small>
                        <input type="url" id="url" name="url" class="form-control @error('url') is-invalid @enderror" aria-describedby="urlHelp" placeholder="Enter fabelio webpage link">
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Add Link</button>
                    <a href="{{ url('/') }}" class="btn btn-primary float-right">See Product List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
