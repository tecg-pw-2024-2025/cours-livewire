<x-Layouts.app>
    <main class="main-content px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto">
        <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto"
             scroll-region="">
            <div>
                <h1 class="mb-8 text-3xl font-bold"><a class="text-indigo-400 hover:text-indigo-600"
                                                       href="/organizations">Organizations</a><span class="text-indigo-400 font-medium">/</span>
                    {{ $organization->name }}
                </h1>
                <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
                    <form>
                        <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="text-input-7125169c-f0d4-4660-9ec1-2371fdbb1ea2">Name:</label>
                                <input id="text-input-7125169c-f0d4-4660-9ec1-2371fdbb1ea2"
                                       class="form-input"
                                       type="text"
                                       value="{{ $organization->name }}">
                            </div>
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="text-input-7af247c0-2f45-4fd1-a651-a7a1ca2b3bb4">Email:</label>
                                <input id="text-input-7af247c0-2f45-4fd1-a651-a7a1ca2b3bb4"
                                       class="form-input"
                                       type="text"
                                       value="{{ $organization->email }}">
                            </div>
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="text-input-f5ebd790-0c20-4e6e-992e-bed7c7c53295">Phone:</label>
                                <input id="text-input-f5ebd790-0c20-4e6e-992e-bed7c7c53295"
                                       class="form-input"
                                       type="text"
                                       value="{{ $organization->phone }}">
                            </div>
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="text-input-ad27f55c-806a-4237-9856-d492737bd583">Address:</label>
                                <input id="text-input-ad27f55c-806a-4237-9856-d492737bd583"
                                       class="form-input"
                                       type="text"
                                       value="{{ $organization->address }}">
                            </div>
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="text-input-100272d8-225e-4b2b-a551-de26c45a5287">City:</label>
                                <input id="text-input-100272d8-225e-4b2b-a551-de26c45a5287"
                                       class="form-input"
                                       type="text"
                                       value="{{ $organization->city }}">
                            </div>
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="text-input-65113d09-63c4-4b41-bd73-82aa54baad78">Province/State:</label>
                                <input id="text-input-65113d09-63c4-4b41-bd73-82aa54baad78"
                                       class="form-input"
                                       type="text"
                                       value="{{ $organization->region }}">
                            </div>
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="select-input-f7e0fabc-6161-47c8-9d2f-a1972054fde4">Country:</label>
                                <select id="select-input-f7e0fabc-6161-47c8-9d2f-a1972054fde4"
                                        class="form-select">
                                    <option></option>
                                    <option value="CA" @selected($organization->country === 'CA')>Canada</option>
                                    <option value="US" @selected($organization->country === 'US')>United States</option>
                                </select></div>
                            <div class="pb-8 pr-6 w-full lg:w-1/2">
                                <label class="form-label"
                                       for="text-input-8b5d0b5f-fd26-497f-80b4-2beddcd719aa">Postal code:</label>
                                <input id="text-input-8b5d0b5f-fd26-497f-80b4-2beddcd719aa"
                                       class="form-input"
                                       type="text"
                                       value="{{ $organization->postal_code }}">
                            </div>
                        </div>
                        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
                            <button class="text-red-600 hover:underline"
                                    tabindex="-1"
                                    type="button">Delete Organization
                            </button>
                            <button class="flex items-center btn-indigo ml-auto"
                                    type="submit">Update Organization
                            </button>
                        </div>
                    </form>
                </div>
                <h2 class="mt-12 text-2xl font-bold">Contacts</h2>
                <div class="mt-6 bg-white rounded shadow overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <tr class="text-left font-bold">
                            <th class="pb-4 pt-6 px-6">Name</th>
                            <th class="pb-4 pt-6 px-6">City</th>
                            <th class="pb-4 pt-6 px-6"
                                colspan="2">Phone
                            </th>
                        </tr>
                        @foreach($organization->contacts as $contact)
                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                <td class="border-t">
                                    <a class="flex items-center px-6 py-4 focus:text-indigo-500"
                                       href="/contacts/{{ $contact->id }}/edit">{{ $contact->name }}</a>
                                </td>
                                <td class="border-t">
                                    <a class="flex items-center px-6 py-4"
                                       tabindex="-1"
                                       href="/contacts/{{ $contact->id }}/edit">{{ $contact->city }}</a>
                                </td>
                                <td class="border-t">
                                    <a class="flex items-center px-6 py-4"
                                       tabindex="-1"
                                       href="/contacts/{{ $contact->id }}/edit">{{ $contact->phone }}</a>
                                </td>
                                <td class="w-px border-t">
                                    <a class="flex items-center px-4"
                                       tabindex="-1"
                                       href="/contacts/{{ $contact->id }}/edit">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20"
                                             class="block w-6 h-6 fill-gray-400">
                                            <polygon points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"></polygon>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </main>
</x-Layouts.app>

