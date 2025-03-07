<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public UserForm $form;

    /**
     * define public variable
     */
    public $name;

    public $email;

    public $password;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $post = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        // redirect
        return redirect()->route('users2');
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
