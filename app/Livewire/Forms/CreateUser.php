<?php

namespace App\Livewire;

use Livewire\Component;

class CreateUser extends Component
{
    public $title = '';

    public $content = '';

    public function save()
    {
        User::create(
            $this->only(['name', 'email', 'password'])
        );

        session()->flash('status', 'User successfully updated.');

        return $this->redirect('vaf.users.index');
    }

    public function render()
    {
        return view('livewire.vaf.users.create');
    }
}
