@extends('layout.template')

@section('content')
<h1>User List</h1>
<a href="{{ route('users.create') }}" class="btn btn-success">Create New User</a>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<table class="table">
  <thead>
    <tr>
      <th>Nomor</th>
       <th>Name</th>
       <th>Email</th>
       <th>Actions</th>
    </tr>
  </thead>
    @foreach ($users as $user)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
