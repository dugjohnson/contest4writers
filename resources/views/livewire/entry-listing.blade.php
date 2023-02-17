<div>
    <div class="max-w-lg divide-y my-4 divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:p-6">
            <x-search-input/>
        </div>
    </div>
    <div class="mt-2 flex flex-col">
        <div class="-my-2 -mx-4">
            <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                <div class="min-w-fit shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Entry #</th>
                            <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Title</th>
                            <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Author</th>
                            <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Category</th>
                            <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Published</th>
                            @if ($isCoordinator)
                                <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Finalist</th>
                            @endif
                            <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Action</th>
                            <th  scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($entries as $entry)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $entry->id }}</td>
                                <td  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $entry->title }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if($isCoordinator)
                                        <a href="/coordinators/users/{{ $entry->user_id }}">{{ $entry->author }}</a>
                                    @else
                                        {{ $entry->author }}
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $entry->category }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{!! ($entry->published?'Yes':'No') !!}</td>
                                @if ($isCoordinator)
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{!! ($entry->finalist?'Yes':'') !!}</td>
                                @endif
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="{!! $isCoordinator ? '/coordinators': '' !!}/entries/{{ $entry->id }}">Show</a>
                                    /
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
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if($entry->invoiceNumber)
                                        <strong>Paid</strong>
                                    @else
                                        <a href="{{ route('paypal.payment.precheck',['entry'=>$entry->id]) }}">
                                            <button>Pay Now</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
