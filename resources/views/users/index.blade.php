@extends('layouts.app')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
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
       <h1> <i class="fa fa-users"></i> {{ __('shop.user.index_title') }} </h1>
      </div>
      
    </div>
<table class="table table-striped shadow-sm" style="background-color:white; border-radius:12px">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Imie</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Numer telefonu</th>
        <th scope="col">Akcje</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->phone_number }}</td>

            <td style="max-width:70px">
              <a href="{{ route('users.edit', $user->id) }}">
                 <button class="btn btn-success btn-sm"><i class="fa fa-pen-to-square"></i></button> </a>
                
              <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}"><i class="fa fa-square-minus"></i>
                
              </button>
            </td>
        </tr>
        @endforeach
     </tbody>
  </table>
  {{ $users->links() }}
</div>
@endsection
@section('javascript')

const deleteUrl = "{{ url('users') }}/";
const confirmDelete ="{{ __('shop.messages.delete_confirm')}}";
@endsection

@section('js-files')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@vite(['resources/js/delete.js'])
@endsection