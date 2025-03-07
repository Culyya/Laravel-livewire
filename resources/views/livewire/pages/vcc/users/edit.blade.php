<?php

use Livewire\Volt\Component;
use App\Models\User;

new class extends Component {

    public $id;
    public $name;
    public $email;

    public function mount($id)
    {
        $user = User::find($id);

        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

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
                    'email' => $this->email
                ]);
            }
        }


        session()->flash('message', 'Data Berhasil Diupdate.');


        return redirect()->route('vcc.users.index');
    }
}; ?>

<div>
    <div class="overflow-x-auto px-12 py-12">
        <form wire:submit="update" class="grid grid-cols-4 gap-4">
            <div>
                <label class="input validator">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                           stroke="currentColor">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </g>
                    </svg>
                    <input type="input" wire:model="name" required placeholder="Username"
                           pattern="[A-Za-z][A-Za-z0-9\-]*" minlength="3" maxlength="30"
                           title="Only letters, numbers or dash"/>
                </label>

                <p class="validator-hint">
                    Must be 3 to 30 characters
                    <br/>containing only letters, numbers or dash
                </p>
            </div>
            <div>
                <label class="input validator">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                           stroke="currentColor">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </g>
                    </svg>
                    <input type="email" wire:model="email" placeholder="mail@site.com" required/>
                </label>
                <div class="validator-hint hidden">Enter valid email address</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

