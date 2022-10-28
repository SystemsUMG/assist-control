<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Permission $permission;

    public $search = '';

    public $showingModal = false;
    public $modalTitle = '';

    protected function rules()
    {
        return [
            'permission.name' =>['required', 'string']
        ];
    }

    public function newPermission()
    {
        $this->modalTitle = trans('crud.permissions.create_title');
        $this->permission = new Permission();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function editPermission(Permission $permission)
    {
        $this->modalTitle = trans('crud.permissions.edit_title');
        $this->permission = $permission;

        $this->showingModal = true;
    }

    public function deletePermission(Permission $permission)
    {
        $permission->delete();
    }

    public function save()
    {
        $this->validate();
        $this->permission->save();
        $this->showingModal = false;
    }

    public function render()
    {
        $permissions = Permission::where('name', 'like', "%{$this->search}%")->latest()->paginate(16);
        return view('livewire.permissions.permissions', [
            'permissions' => $permissions
        ]);
    }
}
