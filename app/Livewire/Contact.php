<?php

namespace App\Livewire;

use App\Models\Divisions;
use App\Models\Institutions;
use Livewire\Component;

class Contact extends Component
{
    public $contact;
    public $selectedDivision;
    public $institution;
    public $position;
    public $code;
    public $phone;
    public $extension;
    public $mobile;
    public $fax;
    public $email;
    public $specialFeature;
    public $clarification;
    public $address;
    public $typeContact;
    public $language;
    public $status;

    public function updatedSelectedDivision($division_id)
    {
        if(intval($division_id)==0)
        {
            $this->institution=Institutions::all();
        }
        else
        {
            $this->institution=Institutions::where('division_id','=',$division_id)->get();
        }
    }

    public function render()
    {
        $division=Divisions::all();
        return view('livewire.contact', ['division'=>$division]);
    }
}
