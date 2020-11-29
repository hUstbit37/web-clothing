<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\CategoryService;

class Search extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categories = $categoryService->getAll();
//        dd($this->categories);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.search');
    }
}
