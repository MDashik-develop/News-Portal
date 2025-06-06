<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public $categoryId;
    public $name;
    public $description;
    public $parent_id;
    public $order = 0;
    public $is_menu = 1;
    public $status = 1;
    public $categories;

    public function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->parent_id = $category->parent_id;
        $this->order = $category->order ?? 0;
        $this->is_menu = $category->is_menu ?? 1;
        $this->status = $category->status ?? 1;

        // Load all categories except current one to avoid selecting itself as parent
        $this->categories = Category::where('id', '!=', $this->categoryId)->get();
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', Rule::unique('categories', 'name')->ignore($this->categoryId)],
            'description' => ['nullable', 'string'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_menu' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ]);

        $category = Category::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->name,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'order' => $this->order,
            'is_menu' => $this->is_menu,
            'status' => $this->status,
        ]);

        // session()->flash('success', 'Category updated successfully!');
        // return redirect()->route('categories.index');
        
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Category updated successfully!',
        ]);
        return $this->redirect(route('categories.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.category.edit');
    }
}