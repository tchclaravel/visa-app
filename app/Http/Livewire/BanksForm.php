<?php

namespace App\Http\Livewire;

use App\Custom\MyHelpers;
use App\Models\Bank;
use App\Models\Traveler;
use App\Models\User;
use App\Models\VisaRequest;
use Livewire\Component;

class BanksForm extends Component
{

    public $bank;

    public $info;

    public $banks = [];

    protected $rules = [
        'bank' => 'required',
    ];
    
    public $messages = [
        'bank.required' => 'يرجى إختيار أحد البنوك التالية'
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function render()
    {     
        if(!empty($this->bank)){
            $this->info = Bank::where('id' , $this->bank)->first();
        }

        // Hide information place when not select option
        if($this->bank == null){
            $this->info = null;
        }

        return view('livewire.banks-form' , [$this->banks = Bank::all()]);
    }


    public function storeBank(){

        $this->validate();
        session()->put('paid' , true);

        // Create Data
        MyHelpers::createData();
        
        return redirect()->route('client.request_sent');
    }


}
