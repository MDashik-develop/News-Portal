<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')

</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">

    @can('admin.panel')
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    @can('admin.panel')
                        <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
                    @endcan
                    @can('user.edit')
                    <flux:navlist.item icon="user" :href="route('users.index')" :current="request()->routeIs('users.index')"
                        wire:navigate>{{ __('Users') }}</flux:navlist.item>
                    @endcan
                </flux:navlist.group>
                @can('user.permission')
                    <flux:navlist.group expandable :expanded="request()->routeIs('permissions.*')" heading="Permission"
                        class="lg:grid">
                        <flux:navlist.item :href="route('permissions.index')" :current="request()->routeIs('permissions.index')"
                            wire:navigate>{{ __('Permissions') }}</flux:navlist.item>
                        <flux:navlist.item :href="route('permissions.roles.index')"
                            :current="request()->routeIs('permissions.roles.index')" wire:navigate>{{ __('Roles') }}
                        </flux:navlist.item>
                        <flux:navlist.item :href="route('permissions.user-roles.index')"
                            :current="request()->routeIs('permissions.user-roles.index')" wire:navigate>{{ __('User Roles') }}
                        </flux:navlist.item>
                    </flux:navlist.group>
                @endcan
                @can('website.maintenance')
                    <flux:navlist.group expandable :expanded="request()->routeIs('website.*')" heading="Websites"
                        class="lg:grid">
                        <flux:navlist.item :href="route('website.index')" :current="request()->routeIs('website.index')"
                            wire:navigate>{{ __('Details') }}</flux:navlist.item>
                        <flux:navlist.item :href="route('website.logos')" :current="request()->routeIs('website.logos')"
                            wire:navigate>{{ __('Logos') }}</flux:navlist.item>
                    </flux:navlist.group>
                @endcan
                @can('ads')
                        <flux:navlist.group expandable :expanded="request()->routeIs('admin.ads.*')" heading="Advertisements"
                            class="lg:grid">
                            <flux:navlist.item :href="route('admin.ads.slots.index')" :current="request()->routeIs('admin.ads.slots.index')"
                                wire:navigate>{{ __('Advertisement') }}</flux:navlist.item>
                            <flux:navlist.item :href="route('admin.ads.settings')"
                                :current="request()->routeIs('admin.ads.settings')" wire:navigate>{{ __('AdSense Settings') }}
                            </flux:navlist.item>
                        </flux:navlist.group>
                @endcan
                @can('categories.edit')
                <flux:navlist.group expandable :expanded="request()->routeIs('categories.*')" heading="Categories"
                    class="lg:grid">
                    <flux:navlist.item :href="route('categories.index')" :current="request()->routeIs('categories.index')"
                        wire:navigate>{{__('All Categories') }}</flux:navlist.item>
                    <flux:navlist.item :href="route('categories.create')" :current="request()->routeIs('categories.create')"
                        wire:navigate>{{ __('Categories Create') }}</flux:navlist.item>
                </flux:navlist.group>
                @endcan
                @canany(['post.maintenance', 'post.create'])
                <flux:navlist.group expandable :expanded="request()->routeIs('posts.*')" heading="Posts" class="lg:grid">
                    @can('post.maintenance')
                    <flux:navlist.item :href="route('posts.index')" :current="request()->routeIs('posts.index')"
                        wire:navigate>{{ __('All Posts') }}</flux:navlist.item>
                    @endcan
                    <flux:navlist.item :href="route('posts.create')" :current="request()->routeIs('posts.create')"
                        wire:navigate>{{ __('Post Create') }}</flux:navlist.item>
                    <flux:navlist.item :href="route('posts.polls.create')" :current="request()->routeIs('posts.polls.create')"
                        wire:navigate>{{ __('Pull Create') }}</flux:navlist.item>
                    @can('polls.edit')
                    <flux:navlist.item :href="route('posts.polls.index')" :current="request()->routeIs('posts.polls.index')"
                        wire:navigate>{{ __('All Polls') }}</flux:navlist.item>
                    @endcan
                </flux:navlist.group>
                @endcanany
            </flux:navlist>

            <flux:spacer />

            {{-- <flux:navlist variant="outline">
                <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                    target="_blank">
                    {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                    target="_blank">
                    {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist> --}}

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
    @endcan

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