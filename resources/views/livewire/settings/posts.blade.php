<section class="w-full">
    @include('partials.settings-heading')

    <div class="flex items-start max-md:flex-col">
        <div class="me-10 w-full pb-4 md:w-[220px]">
            <flux:navlist>
                <flux:navlist.item :href="route('settings.profile')" wire:navigate>{{ __('Profile') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('settings.posts')" wire:navigate>{{ __('My Posts') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('settings.password')" wire:navigate>{{ __('Password') }}
                </flux:navlist.item>
                <flux:navlist.item :href="route('settings.appearance')" wire:navigate>{{ __('Appearance') }}
                </flux:navlist.item>
            </flux:navlist>
        </div>

        <flux:separator class="md:hidden" />

        <div class="flex-1 self-stretch max-md:pt-6">
            <flux:heading>{{ $heading ?? '' }}</flux:heading>
            <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

            <div class="mt-5 w-full max-w-7xl">

                <div class="w-full">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
                            <div class="flex items-center gap-4 max-w-1/2 w-auto sm:w-full">
                                <div class="relative flex-1 sm:w-full">
                                    <flux:input wire:model.live="search" icon="magnifying-glass"
                                        placeholder="Search posts" />
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <flux:button href="{{ route('posts.create') }}" variant="primary" icon="plus"
                                    wire:navigate>
                                    Add New Post
                                </flux:button>
                            </div>
                        </div>

                        <div class="overflow-x-auto bg-white rounded-lg border mb-2.5">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category</th>
                                        <th
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Order</th>
                                        <th
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Published</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if($posts->isNotEmpty())
                                    @foreach($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                                        <td class="px-6 py- text-center whitespace-nowrap">
                                            <a href="{{ route('post.view', ['slug' => $post->slug]) }}" wire:navigate
                                               class="hover:text-blue-500 hover:border-b-2 hover:border-blue-500">
                                                {{ Str::limit($post->title, 40, '...') }}</a>
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $post->category?->name ??
                                            'Uncategorized' }}</td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">{{ $post->category?->order
                                            }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($post->status === 'published') bg-green-100 text-green-800
                                                @elseif($post->status === 'draft') bg-gray-100 text-gray-800
                                                @elseif($post->status === 'pending') bg-yellow-100 text-yellow-800
                                                @else bg-red-100 text-red-800
                                                @endif">
                                                {{ ucfirst($post->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $this->getBengaliTimeAgo($post->published_at) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-gray-500">
                                            No posts found.
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        {{ $posts->links("pagination::tailwind") }}
                    </div>
                </div>

            </div>
        </div>
</section>