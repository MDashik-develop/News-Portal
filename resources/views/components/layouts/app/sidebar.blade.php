<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')

</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">

    {{-- Alpinejs nitfication --}}
    @if (session('success') || $errors->any())
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed top-5 right-5 z-50 px-6 py-4 rounded-md shadow-lg text-white transition-all duration-500" :class="{
                    'bg-green-500': {{ session('success') ? 'true' : 'false' }}, // সরাসরি boolean মান ব্যবহার করুন
                    'bg-red-500': {{ $errors->any() ? 'true' : 'false' }}
                }">
        @if (session('success'))
        <div
            class="fixed top-5 right-5 bg-white p-4 rounded-md shadow-lg border border-green-400 flex items-start space-x-3">
            <div class="flex-shrink-0">
                {{-- Green checkmark circle icon --}}
                <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="flex-grow">
                <p class="text-sm font-medium text-gray-900">Post created</p>
                <p class="text-sm text-gray-600">
                    {{-- Display the dynamic success message from the session --}}
                    {{ session('success') }}
                </p>
            </div>
            <div class="flex-shrink-0">
            </div>
        </div>
        @endif
        <livewire:partials.notifications />

        @if ($errors->any())
        <div x-data="{ showErrorToast: true }" x-show="showErrorToast"
            x-init="setTimeout(() => showErrorToast = false, 8000)" {{-- Display for 8 seconds, adjust as needed --}}
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="fixed top-5 right-5 bg-white p-4 rounded-md shadow-lg border border-red-400 flex items-start space-x-3 z-50"
            role="alert">

            <div class="flex-shrink-0">
                {{-- Red error/warning icon --}}
                <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m0-3.75c-.026.026-.052.052-.079.079M12 9V6.75m0 6V12m6-3a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0-.414.168-.79.44-1.06S10.836 8.25 11.25 8.25s.79.168 1.06.44c.272.272.44.646.44 1.06 0 .414-.168.79-.44 1.06S11.664 11.25 11.25 11.25s-.79-.168-1.06-.44A1.49 1.49 0 019.75 9.75z" />
                </svg>
            </div>

            <div class="flex-grow">
                <p class="text-sm font-medium text-gray-900">
                    {{-- You can customize this title --}}
                    Please fix the following {{ $errors->count() > 1 ? 'errors' : 'error' }}:
                </p>
                <div class="mt-1 text-sm text-gray-600">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>
                            <span class="flex items-center">
                                <flux:icon name="x-circle" class="w-4 h-4 mr-1.5 text-red-400 flex-shrink-0" />
                                {{ $error }}
                            </span>

                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="flex-shrink-0">
            </div>
        </div>
        @endif
    </div>
    @endif
    {{-- Alpinejs nitfication --}}


    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')" class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                    wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                <flux:navlist.item icon="user" :href="route('users.index')"
                    :current="request()->routeIs('users.index')" wire:navigate>{{ __('Users') }}</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group expandable :expanded="request()->routeIs('website.*')" heading="Websites"
                class="lg:grid">
                <flux:navlist.item :href="route('website.index')" :current="request()->routeIs('website.index')"
                    wire:navigate>{{ __('Details') }}</flux:navlist.item>
                <flux:navlist.item :href="route('website.logos')" :current="request()->routeIs('website.logos')"
                    wire:navigate>{{ __('Logos') }}</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group expandable :expanded="request()->routeIs('categories.*')" heading="Categories"
                class="lg:grid">
                <flux:navlist.item :href="route('categories.index')" :current="request()->routeIs('categories.index')"
                    wire:navigate>{{__('All Categories') }}</flux:navlist.item>
                <flux:navlist.item :href="route('categories.create')" :current="request()->routeIs('categories.create')"
                    wire:navigate>{{ __('Categories Create') }}</flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group expandable :expanded="request()->routeIs('posts.*')" heading="Posts" class="lg:grid">
                <flux:navlist.item :href="route('posts.index')" :current="request()->routeIs('posts.index')"
                    wire:navigate>{{ __('All Posts') }}</flux:navlist.item>
                <flux:navlist.item :href="route('posts.create')" :current="request()->routeIs('posts.create')"
                    wire:navigate>{{ __('Post Create') }}</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist>

        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts

    {{--
    <livewire:partials.notifications /> --}}

    <script>
        // SweetAlert2
            window.addEventListener('notify', event => {
                Swal.fire({
                    title: event.detail.type == "success" ? "Success" : "Oops...",
                    text: event.detail.message,
                    icon: event.detail.type,
                    // timer: 1500

                });
            })
    </script>
</body>

</html>