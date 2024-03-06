<?php

namespace App\Livewire;

use Livewire\Component;

class MultistepForm extends Component
{

    public $experience = [];
    public $allExperience = [];


    public function mount()
    {

        $this->experience = [
            [
                'company_name' => '',
                'job_title' => '',
                'start_date' => '',
                'end_date' => ''
            ]
        ];
    }
    public function addExperience()
    {
        $this->experience[] =
            [
                'company_name' => '',
                'job_title' => '',
                'start_date' => '',
                'end_date' => ''
            ];
    }

    public function deleteExperience($index){

        unset($this->experience[$index]);
        $this->experience = array_values($this->experience);


    }

    public function render()
    {
        return view('livewire.multistep-form');
    }
}
