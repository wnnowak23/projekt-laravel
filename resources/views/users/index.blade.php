@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
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
            <td>
              <button class="btn btn-danger bt-sm delete" data-id="{{ $user->id }}">
                X
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
@endsection

@section('js-files')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@vite(['resources/js/delete.js'])
@endsection