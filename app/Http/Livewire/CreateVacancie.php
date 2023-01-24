<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Ramsey\Uuid\Guid\Guid;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateVacancie extends Component
{

    public $title;
    public $salary;
    public $category;
    public $company;
    public $lastHiringDate;
    public $jobDescription;
    public $image;
    
    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'lastHiringDate' => 'required',
        'jobDescription' => 'required',
        'image' => 'required|image|max:1024'
    ];

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.create-vacancie', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }

    public function createVacancy(){
        $data = $this -> validate();
        $data["image"] = Str::uuid() . "." . $this -> image -> extension();
        $this -> image -> storeAs('public/vacancies', $data["image"]); 

        Vacancy::create([
            'title' => $data["title"],
            'salary_id' => $data["salary"],
            'category_id' => $data["category"],
            'company' => $data["company"],
            'lastHiringDate' => $data["lastHiringDate"],
            'jobDescription' => $data["jobDescription"],
            'image' => $data["image"],
            'user_id' => auth() -> user() -> id,
        ]);

        session() -> flash('message', 'Vacancy published successfully');

        return redirect() -> route('vacancies.index');
    }
}
