<div>
    <div class="mt-2 flex flex-row">
        <div class="-my-2 -mx-4">
            <div class="inline-block py-2 align-middle md:px-6 lg:px-8">
                <div class="min-w-fit shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <div class="divide-y my-4 divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <x-search-input helptext="Search by Title or Name">
                                <div>
                                    <x-input.checkbox wire:model="published"/>
                                    Published
                                    <x-input.checkbox wire:model="unpublished"/>
                                    Unpublished
                                </div>
                            </x-search-input>
                        </div>
                    </div>
                    <div class="divide-y my-4 divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                        <div class="px-4 py-5 sm:p-6">
                            <p>Judging preferences</p>
                            <p>4 = Top choice, 3 = Love to judge, 2 = Would judge if asked, 1 = Would judge in an
                                emergency, 0 = Will not judge</p>
                        </div>
                    </div>
                    <table class="divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Judge #
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                User #
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Name
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                This Year
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Action
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Mainstream
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Long
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Short
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Novella
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Historical
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Paranormal
                            </th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 whitespace-nowrap">
                                Cozy
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($judges as $judge)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $judge->id }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $judge->user_id }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="/coordinators/users/{{ $judge->user_id }}">{{ $judge->judgeName() }}</a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {!! $judge->judgeThisYear?$judge->judgeThisYear:'<em><strong>Not updated</strong></em>' !!}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="/coordinators/judges/{{ $judge->id }}">Show</a>
                                    / <a href="/coordinators/judges/{{ $judge->id }}/edit">Edit</a>
                                    / <a href="/scoresheets/judge/{{ $judge->id }}/comparison">Compare Scores</a></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $judge->mainstream }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $judge->longTitle }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $judge->shortTitle }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $judge->novella }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $judge->historical }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $judge->paranormal }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $judge->cozy }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

