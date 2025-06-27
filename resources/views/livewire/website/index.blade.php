<div>
    <div class="p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold mb-4">Website Settings</h2>
                    
                    <form wire:submit.prevent="saveSettings">
                        <div class="space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                <input type="text" wire:model="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Meta Description -->
                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description</label>
                                <textarea wire:model="meta_description" id="meta_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600"></textarea>
                                @error('meta_description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Tags Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Tags</label>
                                <div id="tag-container" class="flex flex-wrap items-center border border-gray-300 rounded-lg p-2 mb-4">
                                    <input id="tag-input" type="text" class="flex-grow p-1 outline-none border-0" placeholder="Type a tag and press Enter">
                                </div>

                                <!-- Hidden input for Livewire -->
                                <input type="hidden" wire:model.lazy="tagsString" id="tags-hidden">
                                @error('tagsString') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <!-- fb_app_id -->
                            <div>
                                <label for="fb_app_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Facebook App Id</label>
                                <input type="text" wire:model="fb_app_id" id="fb_app_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('fb_app_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Facebook URL -->
                            <div>
                                <label for="facebook_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Facebook URL</label>
                                <input type="text" wire:model="facebook_url" id="facebook_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('facebook_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Twitter URL -->
                            <div>
                                <label for="twitter_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Twitter URL</label>
                                <input type="text" wire:model="twitter_url" id="twitter_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('twitter_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Instagram URL -->
                            <div>
                                <label for="instagram_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Instagram URL</label>
                                <input type="text" wire:model="instagram_url" id="instagram_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('instagram_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Reddit URL -->
                            <div>
                                <label for="reddit_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reddit URL</label>
                                <input type="text" wire:model="reddit_url" id="reddit_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('reddit_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Google News URL -->
                            <div>
                                <label for="google_news_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Google News URL</label>
                                <input type="text" wire:model="google_news_url" id="google_news_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('google_news_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- LinkedIn URL -->
                            <div>
                                <label for="linkedin_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">LinkedIn URL</label>
                                <input type="text" wire:model="linkedin_url" id="linkedin_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-zinc-700 dark:border-zinc-600">
                                @error('linkedin_url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Save Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 ">Save Settings</button>
                            </div>
                        </div>
                    </form>

                    <!-- Tag Script -->
                    <script>
                        function initializeTagsField() {
                            const tagContainer = document.getElementById('tag-container');
                            const tagInput = document.getElementById('tag-input');
                            const hiddenInput = document.getElementById('tags-hidden');
                    
                            if (!tagContainer || !tagInput || !hiddenInput) return;
                    
                            let tags = hiddenInput.value
                                ? hiddenInput.value.split(',').map(tag => tag.trim()).filter(tag => tag !== '')
                                : [];
                    
                            function renderTags() {
                                tagContainer.querySelectorAll('.tag').forEach(tag => tag.remove());
                    
                                tags.forEach((tag, index) => {
                                    const tagElement = document.createElement('div');
                                    tagElement.className = 'tag flex items-center bg-blue-100 text-blue-800 px-2 py-1 rounded mr-2 mb-2';
                                    tagElement.innerHTML = `
                                        <span>${tag}</span>
                                        <button type="button" class="ml-2 text-blue-500 hover:text-blue-700 font-bold" data-index="${index}">
                                            &times;
                                        </button>
                                    `;
                                    tagContainer.insertBefore(tagElement, tagInput);
                                });
                    
                                hiddenInput.value = tags.join(',');
                                hiddenInput.dispatchEvent(new Event('input'));
                            }
                    
                            renderTags();
                    
                            tagInput.addEventListener('keydown', function (e) {
                                if (e.key === 'Enter') {
                                    e.preventDefault();
                                    const newTag = tagInput.value.trim();
                                    if (newTag !== '' && !tags.includes(newTag)) {
                                        tags.push(newTag);
                                        renderTags();
                                    }
                                    tagInput.value = '';
                                }
                            });
                    
                            tagContainer.addEventListener('click', function (e) {
                                if (e.target.tagName === 'BUTTON') {
                                    const index = e.target.getAttribute('data-index');
                                    tags.splice(index, 1);
                                    renderTags();
                                }
                            });
                        }
                    
                        document.addEventListener('livewire:load', () => {
                            initializeTagsField();
                        });
                    
                        document.addEventListener('livewire:navigated', () => {
                            setTimeout(() => {
                                initializeTagsField();
                            }, 100);
                        });
                    
                        // Important: Re-initialize after image upload or input
                        // Livewire.hook('message.processed', (message, component) => {
                        //     initializeTagsField();
                        // });

Livewire.hook('message.processed', () => {
    setTimeout(() => {
        initializeTagsField();
    }, 50);
});
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
