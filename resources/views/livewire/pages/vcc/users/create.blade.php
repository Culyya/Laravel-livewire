<?php

use Livewire\Volt\Component;
use App\Models\User;

new class extends Component {

    public string $name;
    public string $email;
    public $password;

    public function mount()
    {
        $this->age = "ferry";
    }

    public function save()
    {
        $this->validate([
            'email' => 'required|email|unique:App\Models\User,email',
            'name' => 'required',
            'password' => 'required',
        ]);

        $Post = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Data Berhasil Disimpan.');

        // redirect
        return to_route('vcc.users.index');
    }

} ?>

<div>
    <div class="overflow-x-auto px-12 py-12">
        <form wire:submit="save" class="flex flex-col gap-4">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Name</legend>
                <input type="text" class="input" placeholder="Type here" wire:model="name"/>
                @error('name')
                <p class="fieldset-label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Email</legend>
                <input type="text" class="input" placeholder="Type here" wire:model="email"/>
                @error('email')
                <p class="fieldset-label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Password</legend>
                <input type="password" class="input" placeholder="Type here" wire:model="password"/>
                @error('password')
                <p class="fieldset-label text-error">{{ $message }}</p>
                @enderror
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
