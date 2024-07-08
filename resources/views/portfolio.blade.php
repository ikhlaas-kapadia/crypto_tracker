
@extends('layouts.default')

@section('title', 'Portfolio Page')

@section('content')


@if(! Auth::user())
    <div class="row">
        <div class="col">
            <h1 class="page-title">You need to <a href="{{route('register')}}">register</a> or <a href="{{route('login')}}">login</a> to view this page.</h3>
        </div>
    </div>
@else
    {{-- {{dd($data)}} --}}

    {{-- <form method="POST" action="{{ route('addCoin') }}"> --}}
    <form method="" action="">
        @csrf
        <button type="submit" class="btn btn-success logout-btn">Add coin(coming soon)</button>
        {{-- <button type="submit" class="btn btn-link">Logout</button> --}}
    </form>
    @foreach ($data as $portfolio)
        <h1 class="page-title">{{$portfolio->name}}'s Portfolio</h3>
    @endforeach
    @if ($portfolio->coins !== '')
    <div class="container">
        <table id="portfolio-table" class="table table-striped display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Units</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @php
                $coins = $portfolio->coins;
                echo $coins;
                @endphp
                
                {{-- @foreach ($coins as $coin)
                <tr id="{{ $coin['id'] }}" class="test">
                    <td><span><i class="far fa-star star" aria-hidden></i></span></td>
                    <td><span>{{$coin['market_cap_rank']}}</span></td>
                    <td id={{ $coin['id'] }}> 
                        <a href="/coin/{{$coin['id']}}" class="coin-link">
                            <div class="coin-link-container">
                                <img class="coin-small-image" src="{{ $coin['image']}}" alt="">
                                <div class="coin-name-container">
                                    <span>{{$coin['name']}}</span> 
                                    <span class="coin-symbol">
                                        <?php echo strtoupper($coin['symbol'])?>
                                    </span>
                                </div>
                            </div>
                        </a> 
                    </td>
                    <td><span>{{ Number::currency($coin['current_price']) }}</span></td>
                    <td><span>{{ Number::currency($coin['market_cap']) }}</span></td>
                    @if($coin['price_change_percentage_7d_in_currency'] < 0 )
                    <td>
                        <span class="coin-price-down">
                            <i class="fas fa-fw fa-caret-down"></i>
                            {{number_format($coin['price_change_percentage_7d_in_currency'],2)}}%
                        </span>
                    </td>
                    @else
                    <td>
                        <span class="coin-price-up">
                            <i class="fas fa-fw fa-caret-up"></i>
                            {{number_format($coin['price_change_percentage_7d_in_currency'],2)}}%
                        </span>
                    </td>
                    @endif
                    @if($coin['price_change_percentage_7d_in_currency'] < 0 )
                    <td>
                        <span class="coin-price-down">
                            <i class="fas fa-fw fa-caret-down"></i>
                            {{number_format($coin['price_change_percentage_30d_in_currency'],2)}}%
                        </span>
                    </td>
                    @else
                    <td>
                        <span class="coin-price-up">
                            <i class="fas fa-fw fa-caret-up"></i>
                            {{number_format($coin['price_change_percentage_30d_in_currency'],2)}}%
                        </span>
                    </td>
                    @endif
                  
                    <td><span>{{Number::currency($coin['ath'])}}</span></td>
                </tr>
            @endforeach --}}
            </tbody>

        </table>
    </div>
    @else
    <p>No coins in your portfolio. Please add some coins</p>
    @endif


@endif
@endsection

@section('datatable-css')
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" /> --}}
@endsection

@push('datatable-script')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
   <script> src="https://cdn.datatables.net/scroller/2.4.3/js/dataTables.scroller.js"</script>
@endpush

@push('portfolio-view-script')
    <script src="{{ asset('js/portfolio.js') }}"></script>
@endpush

