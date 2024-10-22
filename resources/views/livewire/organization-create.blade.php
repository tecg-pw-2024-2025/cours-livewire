<main class="relative main-content px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto">
    <div class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto"
         scroll-region="">
        <div class="hidden"
             @spinner-ended.window="
                    $el.classList.remove('hidden');
                    $el.classList.add('dissolve');
                    setTimeout(()=>$el.classList.add('hidden'),2000)
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
               href="/organizations">Organizations</a><span class="text-indigo-400 font-medium">/</span><span>Create</span>
        </h1>
        <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
            <form wire:submit="save">
                <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                    <x-label-and-input label-text="Name:"
                                       autofocus
                                       model-property="form.name" />
                    <x-label-and-input label-text="Email:"
                                       model-property="form.email" />
                    <x-label-and-input label-text="Phone:"
                                       model-property="form.phone" />
                    <x-label-and-input label-text="Address:"
                                       model-property="form.address" />
                    <x-label-and-input label-text="City:"
                                       model-property="form.city" />
                    <x-label-and-input label-text="Province/State:"
                                       model-property="form.region" />
                    <x-label-and-select label-text="Country:"
                                        type="select"
                                        model-property="form.country"
                                        :options="config()->get('organisations')" />
                    <x-label-and-input label-text="Postal Code:"
                                       model-property="form.postal_code" />
                </div>
                <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
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
                            <div class="flex gap-4"><span class="btn-spinner"></span><span>Creating Organization</span>
                            </div>
                        </template>
                        <template x-if="!saving">
                            <div>Create Organization</div>
                        </template>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
