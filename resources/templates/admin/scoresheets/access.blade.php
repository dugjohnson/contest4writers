<div>
    <div class="large-12 columns">
        <strong>Total Scoresheets: {!! count($scoresheets) !!}</strong>
        <table>
            <thead>
            <tr>
                <td>Scoresheet #</td>
                <td>Title</td>
                <td>Category</td>
                <td>Published</td>
                <td>Judge ID</td>
                <td>Judge name</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach( $scoresheets as $scoresheet)
                <tr>
                    <td>{{$scoresheet->id}}</td>
                    <td>{{$scoresheet->title}}</td>
                    <td>{{$scoresheet->category}}</td>
                    <td>{{$scoresheet->published}}</td>
                    @if(isset($scoresheet->judge))
                        <td>{{$scoresheet->judge_id}}</td>
                        <td>{{$scoresheet->judge->judgeName()}}</td>
                        <td>
                            <a href="/coordinators/users/{{ $scoresheet->judge->user_id }}">Profile</a>/<a href="/coordinators/judges/{{ $scoresheet->judge_id }}">Preferences</a>
                        </td>
                    @else
                        <td>NA</td>
                        <td>NA</td>
                        <td>NA</td>
                    @endif
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>
