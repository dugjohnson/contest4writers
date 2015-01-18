@extends('layout')

@section('content')
    <table>
        <thead>
        <tr>
            <td>Category</td>
            <td>Count</td>
            <td>Published</td>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryCounts as $count)
            <tr>
                <td>{{$count->category}}</td>
                <td>{{ $count->categorycount }}</td>
                <td>{{($count->published?'Yes':'No')}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>

@stop

@section('sidebar')
@stop

