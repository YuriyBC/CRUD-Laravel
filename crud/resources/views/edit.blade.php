@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form method="post"
                  id="form1"
                  action="{{action('HomeController@update',$user->id)}}"
                  enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
            <table class="table col-md-12
        table-hover">
                <thead>
                <tr class="table-info">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    <tr scope="row">
                        <th>{{$user->id}}</th>
                        <th>
                            <input type="text"
                                   name="name"
                                   value="{{$user->name}}">
                        </th>
                        <th>
                            <input type="text"
                                   name="email"
                                   value="{{$user->email}}">
                           </th>
                        <th><input type="text"
                                   name="password"
                                   value="{{$user->password}}"></th>
                        <th>
                            <a class="text-dark
                                disabled"
                               href="{{action
                               ('HomeController@edit', $user['id'])}}">Edit</a>
                        </th>
                        <th>
                                <button
                                        onclick="deleteItem(this, {{$user['id']}})"
                                        value="{{csrf_token() }}"
                                        form="form2"
                                        class="btn btn-danger" type="submit">Delete</button>
                        </th>
                    </tr>

                </tbody>

            </table>
            </form>
            <button type="submit"
                    form="form1"
                    class="btn btn-success" style="margin-left:38px">Update</button>


@endsection