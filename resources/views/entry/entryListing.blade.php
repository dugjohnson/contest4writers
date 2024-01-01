<table>
    <thead>
    <tr>
        <td>Entry #</td>
        <td>Title</td>
        <td>Author</td>
        <td>Category</td>
        <td>Published</td>
        @if ($isCoordinator)
            <td>Finalist</td>
        @endif
        <td>Action</td>
        <td>Payment</td>
    </tr>
    </thead>
    <tbody>
    @foreach($entries as $entry)
        <tr>
            <td>{{ $entry->id }}</td>
            <td>{{ $entry->title }}</td>
            <td>
                @if($isCoordinator)
                    <a href="/coordinators/users/{{ $entry->user_id }}">{{ $entry->author }}</a>
                @else
                    {{ $entry->author }}
                @endif
            </td>
            <td>{{ $entry->category }}</td>
            <td>{!! ($entry->published?'Yes':'No') !!}</td>
            @if ($isCoordinator)
                <td>{!! ($entry->finalist?'Yes':'') !!}</td>
            @endif
            <td><a href="{!! $isCoordinator ? '/coordinators': '' !!}/entries/{{ $entry->id }}">Show</a> /
                @if($entry->finalist && ! $entry->published)
                    <a href="/entries/final/{{ $entry->id }}/upload">Upload final</a> /
                @endif
                @if($entry->received)
                    @if($isCoordinator)
                        <a href="/coordinators/entries/{{ $entry->id }}/edit">Edit /</a>
                    @endif
                    <strong>Locked</strong>
                @else
                    <a href="{!! $isCoordinator ? '/coordinators': '' !!}/entries/{{ $entry->id }}/edit">Edit</a>
                    <br>
                    <a href="{!! $isCoordinator ? '/coordinators': '' !!}/entries/{{ $entry->id }}/upload">Upload/Replace
                        Entry</a>
                @endif
            </td>
            <td>
                @if($entry->invoiceNumber)
                    <strong>Paid</strong>
                @else
                    @if( true )
                        <strong>PayPal payment is not currently available. We will email you when you can pay</strong>
                    @else
                        <a href="{{ route('paypal.payment.precheck',['entry'=>$entry->id]) }}">
                            <button>Pay Now</button>
                        </a>
                    @endif
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
