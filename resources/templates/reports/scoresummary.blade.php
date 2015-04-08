@extends('layout-nonav')

@section('content')
    <h4>Score Sheet Summary</h4>
    <table>
        <thead>
        <tr>
            <td>Entry #</td>
            <td>Total Score</td>
            <td>Total Score Low</td>
            <td>Total Tie Breaker</td>
            <td>Total Tie Breaker Low</td>
            <td>Total Tie Breaker Minus Low</td>
            <td>Total Score Minus Low</td>
        </tr>
        <tr>
            <td>Entry #</td>
            <td>Title</td>
            <td>Judge</td>
            <td>Score</td>
            <td>Tie Breaker</td>
            <td>Completed</td>
        </tr>        </thead>
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
            <?php $theDetails = $scoresheets->where( 'entry_id', $result->entryNumber ); ?>
            @foreach($theDetails as $detail)
                <tr>
                    <td>{{$detail->entry_id}}</td>
                    <td>{{$detail->title}}</td>
                    <td>{{$detail->judge_id}}</td>
                    <td>{{$detail->finalScore}}</td>
                    <td>{{$detail->tiebreaker}}</td>
                    <td>{!! $detail->completed?'Completed':'Incomplete' !!}</td>
                </tr>
            @endforeach
            <tr><td colspan="7"><hr></td> </tr>

        @endforeach
        </tbody>
    </table>
@stop