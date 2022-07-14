<div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="grid grid-cols-8 gap-8 mb-4">
                        <div class="col-span-3">
                            <label for="search" class="block text-sm font-medium text-gray-700">
                                {{ __('Search') }}
                            </label>
                            <div class="mt-1">
                                <input type="text" wire:model="search" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="domain" class="block text-sm font-medium text-gray-700">
                                {{ __('Domains') }}
                            </label>
                            <select id="domain" wire:model="domain" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">{{ __('All') }}</option>
                                @foreach($domains as $domain)
                                    <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                {{ __('Status') }}
                            </label>
                            <fieldset class="mt-3">
                                <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                    <div class="flex items-center">
                                        <input id="status:all" wire:model="status" type="radio" checked value="all"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="status:all" class="ml-3 block text-sm font-medium text-gray-700">
                                            {{ __('All') }}
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="status:active" wire:model="status" type="radio" value="active"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="status:active" class="ml-3 block text-sm font-medium text-gray-700">
                                            {{ __('Active') }}
                                        </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="status:hidden" wire:model="status" type="radio" value="hidden"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="status:hidden" class="ml-3 block text-sm font-medium text-gray-700">
                                            {{ __('Hidden') }}
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                    @if($posts->count())
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Title') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Status') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Domain') }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center" title="{{ $post->excerpt }}">
                                            <div class="flex-shrink-0 h-16 w-16">
                                                <img class="h-16 w-16 rounded-full" src="{{ $post->cover }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $post->title }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $post->slug }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $post->updated_at->format('d M Y') }}
                                                    &bullet;
                                                    {{ $post->reading_time }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($post->published_at)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">{{ __('Active') }}</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">{{ __('Hidden') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $post->blog_domain->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-8">
                                        @if ($post->preview)
                                            <a class="text-sky-600 hover:text-sky-900" href="{{ route('preview', $post->preview) }}">
                                                {{ __('Preview') }}
                                        </a>
                                        @endif
                                        <span wire:click="edit({{ $post->id }})" class="cursor-pointer text-sky-600 hover:text-sky-900">{{  __('Edit')  }}</span>

                                        @if(!$post->next)
                                            <span wire:click="addChapter({{ $post->id }})" class="cursor-pointer text-sky-600 hover:text-sky-900">{{  __('Add Chapter')  }}</span>
                                        @endif()
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <div class="my-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
</div>
