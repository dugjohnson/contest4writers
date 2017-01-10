@extends('layout')
@section('content')
    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>First</td>
            <td>Last</td>
            <td>Writing</td>
            <td>Email</td>
            <td>Judge</td>
            <td>Entrant</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->firstName}}</td>
                <td>{{$user->lastName}}</td>
                <td>{{$user->writingName}}</td>
                <td>{{$user->email}}</td>
                <td>{!!$user->isJudge()?'Yes':'No'!!}</td>
                <td>{!!$user->isEntrant()?'Yes':'No'!!}</td>
                <td>
                    <a href="/users/{{$user->id}}">Show </a>/
                    <a href="/users/{{$user->id}}/edit"> Edit</a>
                    @if( ! ($user->isJudge() || $user->isEntrant()))
                        <a href="/users/{{$user->id}}/delete"> Delete</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

