
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <h3>Ordini dell'anno corrente:</h3>
    <canvas id="orders"></canvas>
  </div>
</div>

<script id="js_script" src="{{ asset('js/charts_orders.js') }}" 
  data-revenue="{{$revenue_by_month}}" data-orders="{{$orders_by_months}}" defer>
</script>  

@endsection