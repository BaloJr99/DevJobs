<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;

class FilterVacancies extends Component
{
    public $salaries;
    public $categories;
    public $term;
    public $salary;
    public $category;

    public function readFormData(){
        $this -> emit('searchData', $this -> term, $this -> category, $this -> salary);
    }

    public function render()
    {
        $this -> salaries = Salary::all();
        $this -> categories = Category::all();
        return view('livewire.filter-vacancies', [
            'salaries' => $this -> salaries,
            'categories' => $this -> categories
        ]);
    }
}
