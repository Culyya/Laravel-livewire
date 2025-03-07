<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function mount()
    {
        $this->search = '';
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function destroy($id)
{
  $user = User::find($id);

  if($user) {
     $user->delete();
  }

 
  $this->dispatch('data-terhapus', title: 'berhasil', text: 'hebat', icon: 'success'); 
  // route
  // lifecycle hook
  // event listener
  // session flash
  

}

    public function render()
    {
        return view('livewire.user.index', [
            'users' => User::where('name','like',"%".$this->search."%")->latest()->paginate(5)
        ]);
    }
}
