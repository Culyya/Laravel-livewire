<?php

use App\Models\User;
use function Livewire\Volt\{state, mount};

state(['id', 'name', 'email']);

mount(function ($id) {
    $user = User::find($id);

    if ($user) {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }
});

$change = function () {

    $this->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $this->id,
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
};
?>


<div>
    <div class="overflow-x-auto px-12 py-12">
        <form wire:submit="change" class="flex flex-col gap-4">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
