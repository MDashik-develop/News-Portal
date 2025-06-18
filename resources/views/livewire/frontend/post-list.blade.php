<div class="container mx-auto px-4 py-8">
   {{-- Search Bar --}}
   <div class="mb-8">
      <div class="relative">
         <input type="text" wire:model.live="search" placeholder="Search posts..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
         <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <i class="fas fa-search text-gray-400"></i>
         </div>
      </div>
   </div>

   {{-- Featured Posts --}}
   @if($featuredPosts->count() > 0)
   <div class="mb-12">
      <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Featured Posts</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
         @foreach($featuredPosts as $featuredPost)
         <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <a href="{{ route('post.show', $featuredPost->slug) }}">
               <img src="{{ $featuredPost->featured_image }}" alt="{{ $featuredPost->title }}"
                  class="w-full h-64 object-cover">
               <div class="p-6">
                  <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 line-clamp-2">
                     {{ $featuredPost->title }}
                  </h3>
                  <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                     {{ Str::limit(strip_tags($featuredPost->content), 150) }}
                  </p>
                  <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                     <span>{{ $featuredPost->created_at->format('M d, Y') }}</span>
                     <span>{{ $featuredPost->views }} views</span>
                  </div>
               </div>
            </a>
         </div>
         @endforeach
      </div>
   </div>
   @endif

   {{-- Main Content Grid --}}
   <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      {{-- Posts List --}}
      <div class="lg:col-span-2">
         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($posts as $post)
            <div
               class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
               <a href="{{ route('post.show', $post->slug) }}">
                  <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                  <div class="p-4">
                     <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                        {{ $post->title }}
                     </h3>
                     <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                        {{ Str::limit(strip_tags($post->content), 100) }}
                     </p>
                     <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                        <span>{{ $post->views }} views</span>
                     </div>
                  </div>
               </a>
            </div>
            @empty
            <div class="col-span-2 text-center py-12">
               <p class="text-gray-600 dark:text-gray-400">No posts found.</p>
            </div>
            @endforelse
         </div>

         {{-- Pagination --}}
         <div class="mt-8">
            {{ $posts->links() }}
         </div>
      </div>

      {{-- Sidebar --}}
      <div class="lg:col-span-1">
         {{-- Categories --}}
         <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Categories</h3>
            <div class="space-y-2">
               @foreach($categories as $category)
               <a href="{{ route('category.show', $category->slug) }}"
                  class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                  <span class="text-gray-700 dark:text-gray-300">{{ $category->name }}</span>
                  <span class="text-sm text-gray-500 dark:text-gray-400">{{ $category->posts_count }}</span>
               </a>
               @endforeach
            </div>
         </div>

         {{-- Popular Tags --}}
         <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Popular Tags</h3>
            <div class="flex flex-wrap gap-2">
               @foreach($popularTags as $tag)
               <a href="{{ route('tag.show', $tag->slug) }}"
                  class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm hover:bg-gray-200 transition-colors dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                  #{{ $tag->name }}
               </a>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>