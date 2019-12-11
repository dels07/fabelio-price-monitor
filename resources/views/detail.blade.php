@extends('_template')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <a href="{{ url('/') }}" class="btn btn-primary">Back to Product List</a>
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <strong>Product Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ $product->images->small }}">
                    </div>
                    <div class="col-9">
                        <h1 class="h4">{{ $product->title }}</h1>
                        <h2 class="h6 text-muted">{{ $product->alt_title }}</h2>
                        <h3 class="h6"><strong>{{ $product->price_detail }}</strong> <small>({{ $product->updated_at->diffForHumans() }})</small></h3>
                        <a href="{{ $product->url }}" target="_blank"><small>Product Page</small></a>
                    </div>
                </div>
                <hr>
                <ul class="nav nav-tabs" id="productTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="desc" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Other Info</a>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane p-3 fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane p-3 fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                        {!! $product->additional_info !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <strong>Images <small>(click to enlarge)</small></strong>
            </div>
            <div class="card-body text-center">
                @foreach ($product->images->gallery as $image)
                    <a href="{{ $image->medium }}" class="m-2"><img src="{{ $image->small }}"></a>
                @endforeach
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <strong>Price History</strong>
            </div>
            <div class="card-body">
                <canvas id="priceChart" width="100%" height="100%"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js" defer></script> --}}
<script>
    window.onload = function() {
        var ctx = document.getElementById('priceChart').getContext('2d');
        var priceChart = new Chart(ctx, {
            type: 'line',
            data:{
                labels: ['00:00', '01:00', '02:00'],
                datasets: [{
                    label: 'Price',
                    data: [100, 200, 300],
                    fill: false
                }]
            }
        })
    }
</script>
@endsection
