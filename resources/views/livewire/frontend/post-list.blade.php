<div class="min-h-screen">
   <!-- Post Content -->
   <div class="container mx-auto flex flex-col lg:flex-row gap-4">
       <div class="md:w-[70%]">
         <div class="w-full min-h-screen mb-5 px-3 py-3 rounded-xl border bg-gray-50 dark:bg-gray-900 shadow-md">
            <h2 class="text-xl font-bold mb-4">Search results for "{{ $searchQuery }}"</h2>
               <div class="grid grid-cols-2 md:grid-cols-3 w-full gap-2 p-2 mb-3">   
                  @forelse ($posts as $post)
                  <div 
                      x-data="{ ready: false }" 
                      x-init="setTimeout(() => ready = true, 500)">
                      
                      {{-- Placeholder Skeleton --}}
                      <template x-if="!ready">
                          <div class="p-1 sm:p-2">
                              <div class="bg-white border border-gray-200 rounded shadow animate-pulse">
                                  <div class=" h-40 bg-gray-300 rounded-t"></div>
                                  <div class="px-2 py-1 space-y-2">
                                      <div class="h-4 bg-gray-300 rounded w-11/12"></div>
                                      <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                                      <div class="h-4 bg-gray-300 rounded w-2/3"></div>
                                  </div>
                              </div>
                          </div>
                      </template>
              
                      {{-- Actual Post --}}
                      <template x-if="ready">
                          <div class="p-1 sm:p-2">
                              <div class="bg-white border border-gray-200 rounded hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                  <a href="{{ route('post.view', ['slug' => $post->slug]) }}" wire:navigate>
                                      <div class="h-[50%]">
                                          <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-t">
                                      </div>
                                      <div class="px-2 py-1">
                                          <p class="line-clamp-3">{{ $post->title }}</p>
                                      </div>
                                  </a>
                              </div>
                          </div>
                      </template>
              
                  </div>
              @empty
                  <p>No posts found.</p>
              @endforelse
              

                  {{ $posts->links() }}
               </div>
         </div>
       </div>

       <livewire:frontend.layouts.aside />
   </div>
</div>