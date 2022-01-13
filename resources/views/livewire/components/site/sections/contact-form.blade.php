<div class="relative bg-white">
    <div class="lg:absolute lg:inset-0">
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover lg:absolute lg:h-full" src="https://images.unsplash.com/photo-1556761175-4b46a572b786?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1567&q=80" alt="">
        </div>
    </div>
    <div class="relative py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
        <div class="lg:pr-8">
            <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                    Travaillons ensemble
                </h2>
                <p class="mt-4 text-lg text-gray-500 sm:mt-3">
                    Je serai ravi de vous aider. Laissez-moi un message via le formulaire ci-dessous et nous pourrons peut-être commencer quelquechose :)
                </p>
                @if($isSent)
                <div class="mt-4 text-lg text-gray-500 sm:mt-3 bg-emerald-200 p-2 px-4 rounded-md">
                    <p class="text-emerald-800 font-bold">
                        Message envoyé !
                    </p>
                    <div class="h-2"></div>
                    <p class="text-emerald-700">
                        Votre message a bien été envoyé, merci, je vous contacte dès que possible !
                    </p>
                </div>
                @else
                <form wire:submit.prevent="send" class="mt-9 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700 @error('message.first_name') text-red-500 font-bold @enderror">
                            Prénom *
                        </label>
                        <div class="mt-1">
                            <input type="text" wire:model="message.first_name" id="first_name" autocomplete="given-name" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md @error('message.first_name') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" required>
                        </div>
                        @error('message.first_name')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700 @error('message.last_name') text-red-500 font-bold @enderror">
                            Nom *
                        </label>
                        <div class="mt-1">
                            <input type="text" wire:model="message.last_name" id="last_name" autocomplete="given-name" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md @error('message.last_name') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" required>
                        </div>
                        @error('message.last_name')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700  @error('message.email') text-red-500 font-bold @enderror">
                            Email *
                        </label>
                        <div class="mt-1">
                            <input id="email" wire:model="message.email" type="email" autocomplete="email" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md @error('message.email') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>
                        @error('message.email')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="company" class="block text-sm font-medium text-gray-700 @error('message.company') text-red-500 font-bold @enderror">Entreprise</label>
                            <span id="company-description" class="text-sm text-gray-500">Facultatif</span>
                        </div>
                        <div class="mt-1">
                            <input type="text" wire:model="message.company" id="company" autocomplete="organization" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md @error('message.company') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>
                        @error('message.company')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="phone" class="block text-sm font-medium text-gray-700 @error('message.phone') text-red-500 font-bold @enderror">Téléphone</label>
                            <span id="phone-description" class="text-sm text-gray-500">Facultatif</span>
                        </div>
                        <div class="mt-1">
                            <input type="text" wire:model="message.phone" id="phone" autocomplete="tel" aria-describedby="phone-description" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border-gray-300 rounded-md @error('message.phone') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>
                        @error('message.phone')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="content" class="block text-sm font-medium text-gray-700 @error('message.content') text-red-500 font-bold @enderror">
                                Comment puis-je vous aider ?
                            </label>
                            <span id="content-description" class="text-sm text-gray-500 @if(strlen($message->content) > 500) text-red-500 font-bold @endif">
                                {{ strlen($message->content) }}/500
                            </span>
                        </div>
                        <div class="mt-1">
                            <textarea id="content" wire:model="message.content" aria-describedby="content-description" rows="10" class="block w-full shadow-sm sm:text-sm focus:ring-sky-500 focus:border-sky-500 border border-gray-300 rounded-md @error('message.content') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror" required></textarea>
                        </div>
                        @error('message.content')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <fieldset class="sm:col-span-2">
                        <legend class="block text-sm font-medium text-gray-700 @error('message.budget') text-red-500 font-bold @enderror">
                            Budget estimé
                        </legend>
                        @error('message.budget')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mt-4 grid grid-cols-1 gap-y-4">
                            <div class="flex items-center">
                                <input id="budget-under-2k" wire:model="message.budget" value="under_2k" type="radio" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300">
                                <label for="budget-under-2k" class="ml-3">
                                    <span class="block text-sm text-gray-700"> - de 2K€</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="budget-2k-5k" wire:model="message.budget" value="2k-5k" type="radio" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300">
                                <label for="budget-2k-5k" class="ml-3">
                                    <span class="block text-sm text-gray-700">entre 2K€ et 5K€</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="budget-5k-10k" wire:model="message.budget" value="5k-10k" type="radio" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300">
                                <label for="budget-5k-10k" class="ml-3">
                                    <span class="block text-sm text-gray-700">entre 5K€ et 10K€</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="budget-over-10k" wire:model="message.budget" value="over_10k" type="radio" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300">
                                <label for="budget-over-10k" class="ml-3">
                                    <span class="block text-sm text-gray-700">+ de 10K€</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="budget-null" wire:model="message.budget" value="" type="radio" class="focus:ring-sky-500 h-4 w-4 text-sky-600 border-gray-300">
                                <label for="budget-null" class="ml-3">
                                    <span class="block text-sm text-gray-700">Aucune idée</span>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="channel" class="block text-sm font-medium text-gray-700 @error('message.channel') text-red-500 font-bold @enderror">
                            Comment avez-vous entendu parler de moi ?
                            </label>
                            <span id="company-description" class="text-sm text-gray-500">Facultatif</span>
                        </div>
                        <div class="mt-1">
                            <input type="text" wire:model="message.channel"  id="channel" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 block w-full sm:text-sm border-gray-300 rounded-md @error('message.channel') border-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                        </div>
                        @error('message.channel')
                        <div class="text-red-400 p-1">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="text-right sm:col-span-2">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-sky-600 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Envoyer
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
