@extends('layouts.default')

@section('title',$data['name'])

@section('content')

<div class="row">
    <div class="col">
        <h1 class="page-title">{{ $data['name'] }}</h1>
    </div>
</div>
@isset($data)
    <div class="row coin-cards-section">
        <div class="col text-center d-flex justify-content-center mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body"style="background:#89e7cc">
                <h5 class="card-title">Coin Stats</h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex flex-column"> <span class="text-muted">Price</span><span>{{ Number::currency($data['market_data']['current_price']['usd']) }}</span></li>
                <li class="list-group-item d-flex flex-column"> <span class="text-muted">Market Cap Rank</span><span>#{{ $data['market_cap_rank'] }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Market Cap</span><span>{{ Number::currency($data['market_data']['market_cap']['usd']) }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Total Supply</span><span>{{ number_format($data['market_data']['total_supply']) }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Max Supply</span> <span>{{ number_format($data['market_data']['max_supply']) }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Circulating Supply</span><span>{{ number_format($data['market_data']['circulating_supply']) }}</span></li>
                </ul>
            </div>
        </div>

        <div class="col text-center d-flex justify-content-center mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body" style="background:#89e7cc">
                <h5 class="card-title">Price Action</h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item"> 
                    <div class="d-flex flex-column {{ $data['market_data']['price_change_percentage_24h'] > 0 ? 'coin-price-up' : 'coin-price-down'}}">
                        <span class="text-muted">24H</span>
                        <span>
                            {!! $data['market_data']['price_change_percentage_24h'] > 0 ? '<i class="fas fa-fw fa-caret-up"></i>' : '<i class="fas fa-fw fa-caret-down"></i>' !!}
                            {{ number_format($data['market_data']['price_change_percentage_24h'],2) }}%</span>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="d-flex flex-column {{ $data['market_data']['price_change_percentage_7d'] > 0 ? 'coin-price-up' : 'coin-price-down'}}">
                        <span class="text-muted">7D</span>
                        <span>
                            {!! $data['market_data']['price_change_percentage_7d'] > 0 ? '<i class="fas fa-fw fa-caret-up"></i>' : '<i class="fas fa-fw fa-caret-down"></i>' !!}
                            {{ number_format($data['market_data']['price_change_percentage_7d'],2) }}%</span>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="d-flex flex-column {{ $data['market_data']['price_change_percentage_14d'] > 0 ? 'coin-price-up' : 'coin-price-down'}}">
                        <span class="text-muted">14D</span>
                        <span>
                            {!! $data['market_data']['price_change_percentage_14d'] > 0 ? '<i class="fas fa-fw fa-caret-up"></i>' : '<i class="fas fa-fw fa-caret-down"></i>' !!}
                            {{ number_format($data['market_data']['price_change_percentage_14d'],2) }}%</span>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="d-flex flex-column {{ $data['market_data']['price_change_percentage_30d'] > 0 ? 'coin-price-up' : 'coin-price-down'}}">
                        <span class="text-muted">30D</span>
                        <span>
                            {!! $data['market_data']['price_change_percentage_30d'] > 0 ? '<i class="fas fa-fw fa-caret-up"></i>' : '<i class="fas fa-fw fa-caret-down"></i>' !!}
                            {{ number_format($data['market_data']['price_change_percentage_30d'],2) }}%</span>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="d-flex flex-column {{ $data['market_data']['price_change_percentage_60d'] > 0 ? 'coin-price-up' : 'coin-price-down'}}">
                        <span class="text-muted">60D</span>
                        <span>
                            {!! $data['market_data']['price_change_percentage_60d'] > 0 ? '<i class="fas fa-fw fa-caret-up"></i>' : '<i class="fas fa-fw fa-caret-down"></i>' !!}
                            {{ number_format($data['market_data']['price_change_percentage_60d'],2) }}%</span>
                    </div>
                </li>
                <li class="list-group-item"> 
                    <div class="d-flex flex-column {{ $data['market_data']['price_change_percentage_1y'] > 0 ? 'coin-price-up' : 'coin-price-down'}}">
                        <span class="text-muted">1YR</span>
                        <span>
                            {!! $data['market_data']['price_change_percentage_1y'] > 0 ? '<i class="fas fa-fw fa-caret-up"></i>' : '<i class="fas fa-fw fa-caret-down"></i>' !!}
                            {{ number_format($data['market_data']['price_change_percentage_1y'],2) }}%</span>
                    </div>
                </li>
                </ul>
            </div>
        </div>

        <div class="col text-center d-flex justify-content-center mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body" style="background:#89e7cc">
                <h5 class="card-title">Developer Stats</h5>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex flex-column"> <span class="text-muted">Forks</span><span>{{ number_format($data['developer_data']['forks']) }}</span></li>
                <li class="list-group-item d-flex flex-column"> <span class="text-muted">Subscribers</span><span>{{ $data['developer_data']['subscribers'] }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Total Issues</span><span>{{ number_format($data['developer_data']['total_issues']) }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Closed Issues</span><span>{{ number_format($data['developer_data']['closed_issues']) }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Pull Requests Merged</span> <span>{{ number_format($data['developer_data']['pull_requests_merged']) }}</span></li>
                <li class="list-group-item d-flex flex-column"><span class="text-muted">Pull Request Contributors</span><span>{{ number_format($data['developer_data']['pull_request_contributors']) }}</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row crypto-description-container">
        <div class="col d-flex justify-content-center">
            @php
            // dd($data['description']['en']);
            echo '<p style="width:90%">'; 
            echo str_replace("\r\n",'<br>', $data['description']['en']);
            echo '</p>';
            @endphp
        </div>
    </div>
@endisset

@endsection


