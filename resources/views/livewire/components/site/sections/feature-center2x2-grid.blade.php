<div class="py-12 bg-white dark:bg-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-sky-600 dark:text-sky-500 font-semibold tracking-wide uppercase">
                {{ $section }}
            </h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-slate-100 sm:text-4xl">
                {{ $title }}
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-slate-300 lg:mx-auto">
                {{ $description }}
            </p>
        </div>

        <div class="mt-10">
            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-sky-500 text-white">
                            <x-icons.desktop-computer class="w-6 h-6" />
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900 dark:text-slate-100">Site vitrine dynamique</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500 dark:text-slate-300">
                        Prenez un site dynamique simple qui vous servira à transmettre des informations à jour
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-sky-500 text-white">
                            <x-icons.newspaper class="h-6 w-6" />
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900 dark:text-slate-100">
                            Blog et ECM
                        </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500 dark:text-slate-300">
                        Gérer vos contenus que ce soit pour un blog ou de la documentation interne
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-sky-500 text-white">
                            <x-icons.shopping-bag class="h-6 w-6" />
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900 dark:text-slate-100">
                            E-commerce
                        </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500 dark:text-slate-300">
                        Vendez vos produits et vos services en ligne
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-sky-500 text-white">
                            <x-icons.calendar class="h-6 w-6" />
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900 dark:text-slate-100">
                            Réservation en ligne
                        </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500 dark:text-slate-300">
                        Votre activité nécessite des réservations ? Simplifiez-les pour vos clients
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-sky-500 text-white">
                            <x-icons.calculator class="h-6 w-6" />
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900 dark:text-slate-100">
                            Gestion de stocks
                        </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500 dark:text-slate-300">
                        Montez un outil pour gérer vos stocks de manière automatisée
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                            <x-icons.phone class="h-6 w-6" />
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900 dark:text-slate-100">
                            Un besoin différent ?
                        </p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500 dark:text-slate-300">
                        Ceci n'est qu'un catalogue de prototypes, vous pouvez m'appeler pour des besoins spécifiques
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
