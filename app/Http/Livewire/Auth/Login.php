<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    
    public $password;
    public $email;
    public $errorMessage;


    protected $rules = [
       
        'email' => 'required|email', 
        'password' => 'required',
    ];

     public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function loginuser()
    {
        try {  
        $validatedData = $this->validate(); 
            if (Auth::attempt($validatedData)) {  
                $pre_url= url()->previous(); 
                return redirect()->away($pre_url);
            }else{ 
                $this->errorMessage="User not found";
            }

        } catch (\Throwable $th) { 
            $this->errorMessage=$th->getMessage();
            }


          
        

    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
