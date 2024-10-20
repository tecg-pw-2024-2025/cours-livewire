<x-main-content>
    <x-slot name="maincontent">
        <h1 class="mb-8 text-3xl font-bold">Organizations</h1>
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center mr-4 w-full max-w-md">
                <form class="flex w-full bg-white rounded shadow">
                    <button type="button"
                            class="focus:z-10 px-4 hover:bg-gray-100 border-r focus:border-white rounded-l focus:ring md:px-6">
                        <div class="flex items-baseline"><span class="hidden text-gray-700 md:inline">Filter</span>
                            <svg class="w-2 h-2 fill-gray-700 md:ml-2"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 961.243 599.998">
                                <path d="M239.998 239.999L0 0h961.243L721.246 240c-131.999 132-240.28 240-240.624 239.999-.345-.001-108.625-108.001-240.624-240z"></path>
                            </svg>
                        </div>
                    </button>
                    <input class="relative px-6 py-3 w-full rounded-r focus:shadow-outline"
                           autocomplete="off"
                           type="text"
                           name="search"
                           placeholder="Name">
                    <button type="submit" class="focus:z-10 px-4 hover:bg-gray-100 border-r focus:border-white rounded-l focus:ring md:px-6">Search</button>
                </form>
            </div>
            <a class="btn-indigo"
               href="/organizations/create"><span>Create</span><span class="hidden md:inline">&nbsp;Organization</span></a>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Name</th>
                        <th class="pb-4 pt-6 px-6">City</th>
                        <th class="pb-4 pt-6 px-6"
                            colspan="2">Phone
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organizations as $organization)
                        <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                            <td class="border-t"><a class="flex items-center px-6 py-4 focus:text-indigo-500"
                                                    href="/organizations/{{ $organization->id }}/edit">{{ $organization->name }}</a>
                            </td>
                            <td class="border-t"><a class="flex items-center px-6 py-4"
                                                    tabindex="-1"
                                                    href="/organizations/{{ $organization->id }}/edit">{{ $organization->city }}</a>
                            </td>
                            <td class="border-t"><a class="flex items-center px-6 py-4"
                                                    tabindex="-1"
                                                    href="/organizations/{{ $organization->id }}/edit">{{ $organization->phone }}</a>
                            </td>
                            <td class="w-px border-t"><a class="flex items-center px-4"
                                                         tabindex="-1"
                                                         href="/organizations/{{ $organization->id }}/edit">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         class="block w-6 h-6 fill-gray-400">
                                        <polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"></polygon>
                                    </svg>
                                </a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $organizations->links('vendor.pagination.ping') }}
    </x-slot>
</x-main-content>
