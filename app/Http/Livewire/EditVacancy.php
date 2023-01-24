<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EditVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    public $company;
    public $lastHiringDate;
    public $jobDescription;
    public $image;
    public $new_image;
    public $vacancy_id;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'lastHiringDate' => 'required',
        'jobDescription' => 'required',
        'new_image' => 'nullable|image|max:1024'
    ];

    public function mount(Vacancy $vacancy){
        $this -> title = $vacancy -> title;
        $this -> salary = $vacancy -> salary_id;
        $this -> category = $vacancy -> category_id;
        $this -> company = $vacancy -> company;
        $this -> lastHiringDate = Carbon::parse($vacancy -> lastHiringDate) -> format('Y-m-d');
        $this -> jobDescription = $vacancy -> jobDescription;
        $this -> image = $vacancy -> image;
        $this -> vacancy_id = $vacancy -> id;
    }

    public function render()
    {
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.edit-vacancy', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }

    public function editVacancy(){
        $data = $this -> validate();

        if($this -> new_image){
            unlink(storage_path('app/public/vacancies/' . $this -> image));
            $data["image"] = Str::uuid() . "." . $this -> new_image -> extension();
            $this -> new_image -> storeAs('public/vacancies', $data["image"]); 
        }

        $vacancy = Vacancy::find($this -> vacancy_id);
        $vacancy -> title = $data['title'];
        $vacancy -> salary_id = $data['salary'];
        $vacancy -> category_id = $data['category'];
        $vacancy -> company = $data['company'];
        $vacancy -> lastHiringDate = $data['lastHiringDate'];
        $vacancy -> jobDescription = $data['jobDescription'];
        $vacancy -> image = $data['image'] ?? $vacancy -> image;

        $vacancy -> save();

        session() -> flash('message', 'Vacancy was update successfully');

        return redirect() -> route('vacancies.index');
    }
}
