<?php

namespace App\Http\Livewire\Roles;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public Role $role;

    public $showingModal = false;
    public $modalTitle = '';

    public $permissionsId;

    public function mount(Role $role)
    {
        $this->role = $role;
    }

    protected function rules(): array
    {
        return [
            'role.name' => ['required', 'unique:roles,name', 'max:32'],
            'permissionsId' => ['array'],
        ];
    }

    public function newRole()
    {
        $this->modalTitle = trans('crud.roles.create_title');
        $this->role = new Role();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function editRole(Role $role)
    {
        $this->modalTitle = trans('crud.roles.edit_title');
        $this->role = $role;
        $this->showingModal = true;
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
    }

    public function save()
    {
        $this->validate();
        $this->role->save();
        $this->showingModal = false;
    }

    public function addPermission(Role $role)
    {
        if ($this->permissionsId) {
            $firstKey = reset($this->permissionsId);
            $permission = $role->permissions->whereIn('id', $firstKey)->first();
            if (!$permission) {
                $role->givePermissionTo($this->permissionsId);
            }
        }
        $this->permissionsId = [];
    }

    public function deletePermission(Role $role, Permission $permission)
    {
        $role->syncPermissions($role->permissions->whereNotIn('id', $permission->id));
    }

    public function render(): Factory|View|Application
    {
        $roles = Role::where('name', 'like', "%{$this->search}%")->orderBy('id', 'desc')->paginate(4);
        $permissions = Permission::all();
        return view('livewire.roles.roles', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }
}
