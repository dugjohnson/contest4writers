@extends('layout-nonav')

@section('content')
    <h4>Score Sheet Summary</h4>
    <table>
        <thead>
        <tr>
            <td>Entry #</td>
            <td>Total Score</td>
            <td>Total Score Low</td>
            <td>Total Ranking</td>
            <td>Total Ranking Low</td>
            <td>Total Ranking Minus Low</td>
            <td>Total Score Minus Low</td>
        </tr>
        </thead>
        <tbody>
        @foreach($scoreResults as $result)
            <tr>
                <td>{{$result->entryNumber}}</td>
                <td>{{$result->totalScore}}</td>
                <td>{{$result->totalScoreMinus}}</td>
                <td>{{$result->totalRanking}}</td>
                <td>{{$result->totalRankingMinus}}</td>
                <td>{!!$result->totalRanking - $result->totalRankingMinus !!}</td>
                <td>{!!$result->totalScore - $result->totalScoreMinus !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop