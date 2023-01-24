<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use App\Notifications\NewCandidate;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class ApplyForVacancy extends Component
{

    public $cv;
    public $vacancy;

    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function render()
    {
        return view('livewire.apply-for-vacancy');
    }

    public function mount(Vacancy $vacancy){
        $this -> vacancy = $vacancy;
    }

    public function postulate(){
        $data = $this -> validate();
        $data["cv"] = Str::uuid() . "." . $this -> cv -> extension();
        $this -> cv -> storeAs('public/cv', $data["cv"]); 

        $this -> vacancy -> candidates() -> create([
            'user_id' => auth() -> user() -> id,
            'cv' => $data["cv"]
        ]);

        $this -> vacancy -> recruiter -> notify(new NewCandidate($this -> vacancy -> id, $this -> vacancy -> title, auth()  -> user() -> id));
        session() -> flash("message", "We've received your information, good luck");

        return redirect() -> back();
    }
}
