<section class="w-full">
    <nav class="mb-2 sticky top-0 z-50 bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:header container class="header-nav-main">
            <style>
                .header-nav-main > div{
                    padding: 0;
                }
            </style>
            <flux:modal.trigger name="menu-flyout" class="md:hidden">
                <flux:navbar.item icon="bars-3" label="menu-flyout" />
            </flux:modal.trigger>
            <flux:navbar style="" class="overflow-x-auto scrollbar-hidden max-w-10/12 hidden md:flex">
                <flux:navbar.item href="{{ route('home') }}" icon="home" wire:navigate ></flux:navbar.item>
                @foreach ($menuCategories as $category)
                    @if ($category->children->isNotEmpty())
                        <flux:dropdown class="max-lg:hidden">
                            <flux:navbar.item icon:trailing="chevron-down" class="m-0">
                                {{ $category->name }}
                            </flux:navbar.item>
                            <flux:navmenu>
                                @foreach ($category->children as $child)
                                    <flux:navmenu.item href="{{ route('search.category', ['searchQuery' => $child->slug]) }}" wire:navigate >{{ $child->name }}</flux:navmenu.item>
                                @endforeach
                            </flux:navmenu>
                        </flux:dropdown>
                    @else
                        <flux:navbar.item href="{{ route('search.category', ['searchQuery' => $category->slug]) }}" wire:navigate >{{ $category->name }}</flux:navbar.item>
                    @endif
                @endforeach
            </flux:navbar>

            <flux:spacer />

            <flux:navbar class="me-4">
                <div class="hidden md:block">
                    <flux:modal.trigger name="menu-flyout" class="">
                        <flux:navbar.item icon="bars-2" label="menu-flyout" />
                    </flux:modal.trigger>
                </div>
                <flux:modal.trigger name="search-nav">
                    <flux:navbar.item icon="magnifying-glass" label="Search" />
                </flux:modal.trigger>
            </flux:navbar>

            <flux:dropdown position="top" align="start">
                {{-- <flux:avatar class="h-full" size="lg"  badge badge:color="green" circle src="{{ asset('storage/' . auth()->user()->profile_image) }}" /> --}}
                    @if (auth()->check() && auth()->user()->profile_image)

                    <style>
                        .nav-profile-image > div > div {
                            overflow: hidden;
                        }
                    </style>
                        <flux:profile
                            class="nav-profile-image"
                            circle
                            avatar="{{ asset('storage/' . auth()->user()->profile_image) }}"
                        />
                    @else
                        <flux:profile 
                            class="h-full" 
                            size="lg"  
                            badge 
                            badge:color="green" 
                            circle
                            :initials="auth()->check() ? auth()->user()->initials() : 'G'"
                        />
                    @endif
                <flux:menu>
                    <flux:menu.item icon="user">
                        
                        <a href="{{ route('settings.profile') }}" wire:navigate>
                            @if (auth()->check())
                                {{ auth()->user()->name }}
                            @else
                                {{ __('Login') }}
                            @endif
                        </a>
                    </flux:menu.item>
                    @if (auth()->check())
                        <flux:menu.separator />
                        <flux:menu.item >
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" class="w-full" icon="arrow-right-start-on-rectangle">
                                    {{ __('Log Out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu.item>
                    @endif
                </flux:menu>
            </flux:dropdown>
            
            <flux:modal name="search-nav" class="md:w-full max-w-1xl" variant="search">
                <div class="space-y-4">
                    <form wire:submit.prevent="searchPost" class="space-y-4">
                        <div>
                            <flux:heading size="lg">Write what you want to see</flux:heading>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <flux:input wire:model="searchQuery"
                                        type="search"
                                        kbd="⌘K" 
                                        icon="magnifying-glass" 
                                        placeholder="Search..."/>

                            <flux:error name="searchQuery" />
                        </div>
                        <div class="flex w-full">
                            <flux:button type="submit" variant="primary" class="w-full">Search</flux:button>
                        </div>
                    </form>
                </div>
            </flux:modal>
        </flux:header>
        
        <!-- Flyout Modal -->
        <flux:modal name="menu-flyout" variant="flyout" position="left" class="space-y-6  max-h-screen min-h-screen overflow-y-auto bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 p-4">
            <div>

                <div class="flex justify-between items-center">
                </div>

                <flux:navlist variant="outline">
                    @foreach ($menuCategories as $category)
                        @if ($category->children->isNotEmpty())
                            <flux:navlist.group expandable :expanded="false"  class="menu-flyout-nav" heading="{{ $category->name }}">
                                <style>
                                    .menu-flyout-nav button div{
                                        padding-inline-end: 5px;
                                    }
                                </style>
                                @foreach ($category->children as $child)
                                    <flux:navlist.item href="{{ route('search.category', ['searchQuery' => $child->slug]) }}" wire:navigate >{{ $child->name }}</flux:navlist.item>
                                @endforeach
                            </flux:navlist.group>
                        @else
                            <flux:navlist.item href="{{ route('search.category', ['searchQuery' => $category->slug]) }}" wire:navigate >{{ $category->name }}</flux:navlist.item>
                        @endif
                    @endforeach
                </flux:navlist>

                <flux:spacer />

                <flux:navlist variant="outline">
                    {{-- Uncomment or add extra static items --}}
                    {{-- <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item> --}}
                </flux:navlist>

            </div>
        </flux:modal>
    </nav>
    <livewire:ads.display-ads-banner :locationKey="'header_banner'" lazy />
</section>