<!-- Created by: Santiago Albisser -->

@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.dashboard')</div>
                <div class="card-body">
                    Dulce Repostera
                    @guest
                    @else
                        @if (Auth::user()->getRole()=="admin")
                            <br><iframe width="680" height="480" src="https://www.youtube.com/embed/z5CmxGtfq9s?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen allowautoplay></iframe>
                        @endif
                    @endguest

                    <?php
                        function convertCurrency($amount,$from_currency,$to_currency){
                            $apikey = "803332e007126d41e9a9";

                            $from_Currency = urlencode($from_currency);
                            $to_Currency = urlencode($to_currency);
                            $query =  "{$from_Currency}_{$to_Currency}";

                            // change to the free URL if you're using the free version
                            $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
                            $obj = json_decode($json, true);

                            $val = floatval($obj["$query"]);


                            $total = $val * $amount;
                            return number_format($total, 2, '.', '');
                        }

                        //uncomment to test
                        Echo convertCurrency(3757.92, 'COP', 'USD');
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection