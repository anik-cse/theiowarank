<?php

namespace App\Http\Livewire\Admin;

use App\Models\Team;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\PasswordValidationRules;
use Livewire\WithPagination;

use Livewire\Component;

class AddUser extends Component
{
    use PasswordValidationRules;
    use WithPagination;

    protected $listeners = ['delete'];

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create($formData)
    {
        Validator::make($formData, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $formData['name'],
            'email' => $formData['email'],
            'password' => Hash::make($formData['password']),
        ]);

        $user->roles()->attach('1');
        
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully?',
            'text' => '',
        ]);
    }

    /**
     * Delete confirmation.
     *
     * @param  mixed  $user
     * @return void
     */
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        $role = Role::where('name', 'admin')->first();
        return view('livewire.admin.add-user', [
            'users' => $role->users()->paginate(5),
        ]);
    }
}
