@extends('layout-nonav')

@section('content')
    <h4>Score Sheet Summary</h4>
    <table>
        <thead>
        <tr>
            <td>Judge</td>
            <td>Score</td>
            <td>Tie Breaker</td>
            <td>Completed</td>
            <td>Finalist</td>
        </tr>
        <tr style="background-color: #FAD9F9;">
            <td></td>
            <td>Total Scores</td>
            <td>Total Tie Breaker Minus Low</td>
            <td>Minus Low Score</td>
        </tr>
        </thead>
        <tbody>
        @foreach($scoreResults as $result)
            <?php $theDetails = $scoresheets->where( 'entry_id', $result->entryNumber ); ?>
            <tr style="background-color: #D9FADA;">
                <td>{{$theDetails->first()->entry_id}}</td>
                <td>{{$theDetails->first()->title}}</td>
                <td>{{$theDetails->first()->category}}</td>
                <td>{!! $theDetails->first()->published?'Published':'Unpublished' !!}</td>
            </tr>
            @foreach($theDetails as $detail)
                <tr>
                    <td>{{$detail->judge_id}}</td>
                    <td>{{$detail->finalScore}}</td>
                    <td>{{$detail->tiebreaker}}</td>
                    <td>{!! $detail->completed?'Completed':'Incomplete' !!}</td>
                </tr>
            @endforeach
            <tr>
            <tr style="background-color: #FAD9F9;">
                <td>Totals</td>
                <td>{{$result->totalScore}}</td>
                <td>{!!$result->totalRanking - $result->totalRankingMinus !!}</td>
                <td>{!!$result->totalScore - $result->totalScoreMinus !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop