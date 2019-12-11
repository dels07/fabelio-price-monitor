@extends('_template')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <strong>Fabelio Price Monitor</strong>
            </div>
            <div class="card-body">
                <a href="{{ url('add') }}" class="btn btn-success">Add New Link</a>
                <hr>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 20%">Product Name</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center" style="width: 12%">Latest Price</th>
                            <th scope="col" class="text-center" style="width: 12%">Submitted At</th>
                            <th scope="col" class="text-center" style="width: 12%">Updated At</th>
                            <th scope="col" class="text-center" style="width: 14%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->title }}<br>
                                <small>{{ $product->alt_title }}</small>
                            </td>
                            <td>{{ Str::words(strip_tags($product->description), 10, '...') }}</td>
                            <td class="text-right">{{ $product->price_display }}</td>
                            <td class="text-center">{!! $product->created_at_display !!}</td>
                            <td class="text-center">{!! $product->updated_at_display !!}</td>
                            <td class="text-center">
                                <a href="{{ url("/{$product->id}") }}" class="btn btn-primary">Show Details</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No product available, please add using <a href="{{ url('/add') }}">Add New Link</a>.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <hr>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
