
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center mt-2">
    <h3>Seleziona un anno:</h3>
    <div class="col-8 col-md-3">
      <select id="year_selection_chart" class="form-control">        
        @foreach ($list_active_years as $_year)
        <option {{($selected_year == $_year)? 'selected' : ''}} value="/{{$_year}}">{{$_year}}</option>
        @endforeach   
      </select>
    </div>
    <canvas class="mt-5 mx-2" id="orders"></canvas>
  </div>
</div>

<script id="js_script" src="{{ asset('js/charts_orders.js') }}" 
  data-revenue="{{$revenue_by_month}}" data-orders="{{$orders_by_months}}" defer>
</script>  

@endsection