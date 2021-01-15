@extends('layouts.master')
@section('title','Users')

@section('content')
<ul class="nav navbar-dark bg-dark p-3">
    @if (Session::has('updated'))
    <p class="alert alert-success w-50 m-auto">{{Session::get('updated')}}</p> 
    @endif
    @if (Session::has('deleted'))
    <p class="alert alert-success w-50 m-auto">{{Session::get('deleted')}}</p> 
    @endif
    <li class="nav-item ml-auto">
      <a class="nav-link active btn btn-danger" href="logout">Logout</a>
    </li>
    
  </ul>
    <table class="table table-striped table-dark">
        <div class="container">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if (Session::has('user') && Session::get('user')['id'] == $user->id)
                <a class="badge badge-primary" href="users/edit/{{$user->id}}">Edit</a>
                <a class="badge badge-danger" href="users/delete/{{$user->id}}">Delete</a>
                @else
                <span class="badge badge-primary" style="opacity: 0.5;">Edit</span>
                <span class="badge badge-danger" style="opacity: 0.5;">Delete</span>
                @endif
                
            </td>
          </tr>
          @endforeach
        </tbody>
    </div>
      </table>
    
@endsection
