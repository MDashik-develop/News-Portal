<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Traits\HasNotifications;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    use HasNotifications;
     
    public $name, $description, $parent_id, $order, $is_menu, $status;
    public $categories;
    
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function refresh()
    {
        $this->reset(['name', 'description', 'parent_id', 'order', 'is_menu', 'status']);
    }
    
    public function submit()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'parent_id' => 'nullable|integer',
            'order' => 'required|integer',
            'is_menu' => 'required|integer',
            'status' => 'required|integer',
        ]);
        
        $category = new Category();
        $category->name = $this->name;
        $category->description = $this->description;
        $category->parent_id = $this->parent_id ?: null; // Convert empty string to null
        $category->order = $this->order;
        $category->is_menu = $this->is_menu;
        $category->status = $this->status;
        $category->slug = Str::slug($this->name);
        
        try {
            $category->save();
            $this->refresh();
            // $this->dispatch('notify', [
            //     'type' => 'success',
            //     'message' => 'Category created successfully!',
            // ]);
            $this->succsessNotify("hoise banano");
            return $this->redirect(route('categories.index'), navigate:true );
            
        } catch (\Throwable $th) {
            // $this->dispatch('notify', [
            //     'type' => 'error',
            //     'message' => 'Category created unsuccessfully!' . $th->getMessage(),
            // ]);
            $this->unsuccessNotify("hoini banano");            
        }
    }
    public function render()
    {
        return view('livewire.category.create');
    }
}