<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Category;


class SidebarCategories extends Component
{

    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // Forget pluck. It is good when you want just one column, but not multiple 
        $categories = Category::all();
        return view('components.sidebar-categories', ['categories' => $categories]);
    }

    // public function categories()
    // {
    //     $categories = Category::all();
    //     return ((compact('categories')));
    // }

}
