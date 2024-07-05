
<div>
    <h3>{{ $slot }}</h3>
    <?php
        $coins;
        if(count($data)) {
            $coins = $data;
        }
    ?>
 
    <table id="example" class="table table-striped display nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Rank</th>
                <th>Coin</th>
                <th>Price</th>
                <th>Market Cap</th>
                <th>7D</th>
                <th>30D</th>
                <th>ATH</th>
            </tr>
        </thead>
        <tbody>
            @if($coins)
            @foreach ($coins as $coin)
                <tr id="{{ $coin['id'] }}">
                    <td><span><i class="fa-regular fa-star"></i></span></td>
                    <td><span>{{$coin['market_cap_rank']}}</span></td>
                    <td id={{ $coin['id'] }}> 
                        <a href="" class="coin-link">
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
            @endforeach
        @endif
            
        </tbody>
    </table>

</div>
@section('datatable-css')
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
@endsection

@push('datatable-script')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
@endpush

@push('coins-view-script')
    <script src="{{ asset('js/coins.js') }}"></script>
@endpush

