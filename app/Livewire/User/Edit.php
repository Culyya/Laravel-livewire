<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    /**
     * define public variable
     */
    public $id;

    public $name;

    public $email;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $user = User::find($id);

        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($this->id) {

            $user = User::find($this->id);

            if ($user) {
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);
            }
        }

        session()->flash('message', 'Data Berhasil Diupdate.');

        return redirect()->route('users2');
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
