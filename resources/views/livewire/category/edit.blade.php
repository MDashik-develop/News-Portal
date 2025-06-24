<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold">Edit Category</h2>
                    {{-- নিশ্চিত করুন 'categories.index' রাউটটি বিদ্যমান --}}
                    <a href="{{ route('categories.index') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                        Back to Categories
                    </a>
                </div>

                <form wire:submit.prevent="update" class="space-y-6">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="border p-4 rounded-lg">
                            <flux:field class="mb-4">
                                <flux:label>Category Name</flux:label>
                                <flux:input wire:model.live="name" type="text" required />
                                <flux:error name="name" />
                            </flux:field>

                            <flux:field class="mb-4">
                                <flux:label>Description</flux:label>
                                <flux:textarea wire:model.live="description" rows="3" />
                                <flux:error name="description" />
                            </flux:field>

                            <flux:field class="mb-4">
                                <flux:label>Parent Category</flux:label>
                                <flux:select wire:model.live="parent_id" placeholder="Choose Parent Category...">
                                    <flux:select.option value="">None</flux:select.option>
                                    @if ($categories->count() == 0)
                                        <flux:select.option value="">No Category found</flux:select.option>
                                    @else
                                        @foreach($categories ?? [] as $category)
                                            <flux:select.option value="{{ $category->id }}">{{ $category->name }}</flux:select.option>
                                        @endforeach
                                    @endif
                                </flux:select>
                                <flux:error name="parent_id" />
                            </flux:field>

                            <flux:field class="mb-4">
                                <flux:label>Order</flux:label>
                                <flux:input wire:model.live="order" type="number" min="0" />
                                <flux:error name="order" />
                            </flux:field>

                            <flux:field class="mb-4">
                                <flux:label>Show in Menu</flux:label>
                                <flux:select wire:model.live="is_menu">
                                    <flux:select.option value="">Select options</flux:select.option>
                                    <flux:select.option value="1">Yes</flux:select.option>
                                    <flux:select.option value="0">No</flux:select.option>
                                </flux:select>
                                <flux:error name="is_menu" />
                            </flux:field>

                            <flux:field class="mb-4">
                                <flux:label>Status</flux:label>
                                <flux:select wire:model.live="status">
                                    <flux:select.option value="">Select options</flux:select.option>
                                    <flux:select.option value="1">Active</flux:select.option>
                                    <flux:select.option value="0">Inactive</flux:select.option>
                                </flux:select>
                                <flux:error name="status" />
                            </flux:field>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <flux:button type="button" wire:click="$refresh" variant="danger" class="mr-3 danger">
                            Reset
                        </flux:button>
                        <flux:button type="submit" variant="primary">
                            Update Category
                        </flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
