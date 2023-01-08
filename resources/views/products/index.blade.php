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
     <h1><i class="fa fa-rectangle-list"></i>  {{ __('shop.product.index_title') }} </h1>
    </div>
    <div class="col-6">
      <a class="float-right" href="{{ route ('products.create') }}">
      <button type="button" class="btn btn-dark btn-secondary pull-right"> <i class="fa fa-plus"></i> Dodaj</button>
      </a> 
    </div>
  </div>
  <div class="row">
  <table class="table table-striped shadow-sm" style="background-color:white; border-radius:12px">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{ __('shop.product.fields.name') }}</th>
        <th scope="col">{{ __('shop.product.fields.description') }}</th>
        <th scope="col">{{ __('shop.product.fields.amount') }}</th>
        <th scope="col">{{ __('shop.product.fields.price') }}</th>
        <th scope="col">{{ __('shop.product.fields.category') }}</th>
        <th scope="col">{{ __('shop.product.fields.actions') }}</th>
      </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->price }}</td>
            <td> @if($product->hasCategory()) {{ $product->category->name }}
              @endif
            </td>
            <td style="max-width:70px">
              <a href="{{ route('products.show', $product->id) }}">
                <button class="btn btn-primary btn-sm"><i class="fa fa-magnifying-glass"></i>
                  
                </button>
              </a>
              <a href="{{ route('products.edit', $product->id) }}">
                <button class="btn btn-success btn-sm"><i class="fa fa-pen-to-square"></i>
                  
                </button>
              </a>
              <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}"><i class="fa fa-square-minus"></i>
                
              </button>
            </td>
        </tr>
        @endforeach
     </tbody>
  </table>
  {{ $products->links() }}
</div>
</div>
@endsection
@section('javascript')

const deleteUrl = "{{ url('products') }}/";
const confirmDelete ="{{ __('shop.messages.delete_confirm')}}";
@endsection

@section('js-files')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@vite(['resources/js/delete.js'])
@endsection