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
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $category = Category::all()->pluck('category_name');
        return view('components.sidebar-categories', ['category' => $category]);
    }

    // public function categories()
    // {
    //     $categories = Category::all();
    //     return ((compact('categories')));
    // }

}
