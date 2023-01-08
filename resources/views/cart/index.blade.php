@extends('layouts.app')
@section('css-files')
<link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endsection

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

<div class="cart_section" style="padding-right:30px">
    <div class="container-fluid">
        <div class="row" style="justify-content: center">
            <div class="col-lg-10 ">
                <div class="cart_container" >
                    <div class="cart_title">Koszyk<small> ({{ $cart->getItems()->count() }}) </small></div>
                    <form action="{{ route('orders.store')}}" method="POST" id="order-form">
                        @csrf 
                    

                    <div style="width:100%">
                        <table class="table  shadow-sm" style=" background-color: white; border-radius:12px; margin:12px; width:100%">
                            <thead>
                            <tr>
                                <th scope="col">Zdjęcie</th>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Ilość</th>
                                <th scope="col">Cena [PLN]</th>
                                <th scope="col">Suma [PLN]</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->getItems() as $item)
                                <tr style="box-sizing: content-box; width: 100%;border-left: solid #FFFF 10px; border-right: solid #FFFF 10px;">
                                <td class="cart_item_image " ><img src="{{ $item->getImage() }}" alt="Zdjęcie produktu"></td>
                                    
                                    <td>{{ $item->getName() }}</td>
                                    <td>{{ $item->getQuantity() }}</td>

                                    <td>{{ $item->getPrice() }}</td>
                                    <td>{{ $item->getSum() }}</td>
                                    <td class="cart_info_col">
                                            <button type="button" class="btn btn-danger btn-sm delete" data-id="{{ $item->getProductId() }}">
                                                <i class="fa fa-square-minus"></i>                
                                        </button>
                                    </td>
                                    
                                </tr>
                                <td></td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class=" pull-right" style="border-radius: 12px; padding:0px; margin-left:auto; margin-right:auto">
                        
                        <span class="order_total_title my-text-1">Suma [PLN]:</span>
                        <span class="order_total_amount">{{ $cart->getSum() }}</span>
                        
                    </div>
                    </br>
                    <div class="cart_buttons"> 
                    <a href="/" class="btn btn-light btn-info">Kontynuuj zakupy</a> 
                    <button type="submit" class="btn btn-dark add-cart-button" {{ !$cart->hasItems() ? 'disabled' : '' }} >Przejdź do płatności</button> 
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


@section('javascript')
const deleteUrl = "{{ url('cart') }}/";
const confirmDelete ="{{ __('shop.messages.delete_confirm')}}";
@endsection


@section('js-files')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@vite(['resources/js/delete.js'])
@endsection