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

<div class="cart_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Koszyk<small> ({{ $cart->getItems()->count() }}) </small></div>
                    <form action="{{ route('orders.store')}}" method="POST" id="order-form">
                        @csrf 
                    <div class="cart_items">
                        <ul class="cart_list">
                            @foreach($cart->getItems() as $item)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ $item->getImage() }}" alt="Zdjęcie produktu"></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Nazwa</div>
                                                <div class="cart_item_text">{{ $item->getName() }}</div>
                                            </div>                                            
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Ilość</div>
                                                <div class="cart_item_text">{{ $item->getQuantity() }}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Cena [PLN]</div>
                                                <div class="cart_item_text">{{ $item->getPrice() }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Suma [PLN]</div>
                                                <div class="cart_item_text">{{ $item->getSum() }}</div>
                                            </div>
                                            <div class="cart_info_col">
                                                <button type="button" class="btn btn-danger btn-sm delete" data-id="{{ $item->getProductId() }}">
                                                    <i class="fa fa-square-minus"></i>                
                                            </button>
                                            </div>
                                        </div>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Suma [PLN]:</div>
                            <div class="order_total_amount">{{ $cart->getSum() }}</div>
                        </div>
                    </div>
                    <div class="cart_buttons"> 
                    <a href="/" class="button cart_button_clear">Kontynuuj zakupy</a> 
                    <button type="submit" class="button cart_button_checkout" {{ !$cart->hasItems() ? 'disabled' : '' }} >Przejdź do płatności</button> 
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