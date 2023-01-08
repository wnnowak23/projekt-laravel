@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    @if (session('status'))
    <div class="row"> 
      <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>        
            {{ session('status') }}
        </div>
      </div>
    </div>
  @endif
    <div class="row">          
      <div class="col-6">
      <h1><i class="fa fa-rectangle-list"></i> Zamówienia </h1>
      </div>
    </div>
    <div class="row">
  <table class="table table-striped shadow-sm" style=" background-color: white; border-radius:12px">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ilość</th>
          <th scope="col">Cena [PLN]</th>
          <th scope="col">Produkty</th>
        </tr>
      </thead>
      <tbody>
          @foreach($orders as $order)
          <tr>
              <th scope="row">{{ $order->id }}</th>
              <td>{{ $order->quantity }}</td>
              <td>{{ $order->price }}</td>
              <td>                          
                  <ul style="padding-left:5px">
                    @foreach($order->products as $product) 
                  <li> {{ $product->name }} - {{ $product->description }} </li>
                  @endforeach
                  </ul>               
                </td>

              
          </tr>
          @endforeach
      </tbody>
      
    </table>

        <div class="col-md-6" style="width:100%">
            <button type="submit" style="margin:auto; text-align:center; display:block; border:0px; padding:0px" >
            <!-- <a>Kontynuuj zakupy</a> -->
            <a href="/" class="btn btn-dark btn-secondary">Kontynuuj zakupy</a> 
                                      
            </button>
        </div>
  </div>
</div>
@endsection

@section('js-files')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection