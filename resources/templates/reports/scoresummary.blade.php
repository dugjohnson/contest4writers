@extends('layout-nonav')

@section('content')
    <h4>Score Sheet Summary</h4>
    <table>
        <thead>
        <tr>
            <td>Entry #</td>
            <td>Total Score</td>
            <td>Total Ranking</td>
            <td>Total Score Minus</td>
        </tr>
        </thead>
        <tbody>
        @foreach($scoreResults as $result)
            <tr>
                <td>{{$result->entryNumber}}</td>
                <td>{{$result->totalScore}}</td>
                <td>{{$result->totalRanking}}</td>
                <td>{{$result->totalScoreMinus}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop