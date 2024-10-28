<div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto shadow rounded-l-2xl bg-slate-50 h-full border-1 border-slate-400"
     scroll-region="">
    <div class="hidden"
         @spinner-ended.window="
                    $el.classList.remove('hidden');
                    $el.classList.add('dissolve');
                    setTimeout(()=>$el.classList.add('hidden'),1000)
                    ">
        <div class="absolute top-4 left-16 md:left-24 right-0 flex items-center justify-between mb-8 max-w-3xl bg-green-500 rounded">
            <div class="flex items-center">
                <svg class="shrink-0 ml-4 mr-2 w-4 h-4 fill-white"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <polygon points="0 11 2 9 7 14 18 3 20 5 7 18"></polygon>
                </svg>
                <div class="py-4 text-white text-sm font-medium"
                     x-html="$wire.feedback"></div>
            </div>
            <button type="button"
                    class="group mr-2 p-2"
                    @click="$wire.feedback = ''">
                <svg class="block w-2 h-2 fill-green-800 group-hover:fill-white"
                     xmlns="http://www.w3.org/2000/svg"
                     width="235.908"
                     height="235.908"
                     viewBox="278.046 126.846 235.908 235.908">
                    <path d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"></path>
                </svg>
            </button>
        </div>
    </div>
    <h1 class="mb-8 text-3xl font-bold">
        <a class="text-indigo-400 hover:text-indigo-600"
           wire:navigate
           href="/organizations">Organizations</a><span class="text-indigo-400 font-medium">/</span><span x-html="$wire.form.name"></span>
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
        <form wire:submit="save">
            <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                <x-label-and-input label-text="Name:"
                                   class="lg:w-full"
                                   model-property="form.name" />
                <x-label-and-input label-text="Email:"
                                   class="lg:w-full"
                                   model-property="form.email" />
                <x-label-and-input label-text="Phone:"
                                   class="lg:w-full"
                                   model-property="form.phone" />
                <x-label-and-input label-text="Address:"
                                   class="lg:w-full"
                                   model-property="form.address" />
                <x-label-and-input label-text="City:"
                                   class="lg:w-full"
                                   model-property="form.city" />
                <x-label-and-input label-text="Province/State:"
                                   class="lg:w-full"
                                   model-property="form.region" />
                <x-label-and-select label-text="Country:"
                                    class="lg:w-full"
                                    type="select"
                                    model-property="form.country"
                                    :options="config()->get('organisations')" />
                <x-label-and-input label-text="Postal Code:"
                                   class="lg:w-full"
                                   model-property="form.postal_code" />
            </div>
            <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
                <button class="text-red-600 hover:underline"
                        tabindex="-1"
                        type="button">Delete Organization
                </button>
                <button class="flex items-center btn-indigo ml-auto"
                        type="submit"
                        x-data="{ saving: false }"
                        @click="saving = true"
                        x-on:organization-saved.window="setTimeout(function(){
                                saving=false;
                                $dispatch('spinner-ended')
                            },500);"
                        x-on:invalid-data-for-organization.window="setTimeout(function(){
                                saving=false;
                            },300);"
                >
                    <template x-if="saving">
                        <div class="flex gap-4"><span class="btn-spinner"></span><span>Updating Organization</span>
                        </div>
                    </template>
                    <template x-if="!saving">
                        <div>Update Organization</div>
                    </template>
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

