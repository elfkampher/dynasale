<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use App\Models\Users;
use DB;

class Roles extends Component
{
    use WithPagination;

    public $roleName, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->componentName = 'Listado';
        $this->pageTitle = 'Roles';
    }

    public function render()
    {
        if(strlen($this->search) > 0)
            $roles = Role::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination);
        else
            $roles = Role::orderBy('name','asc')->paginate($this->pagination);

        return view('livewire.roles.component',[
            'roles' => $roles
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function CreateRole()
    {
        $rules = ['roleName' => 'required|min:2|unique:roles,name'];
        $messages = [
            'roleName.required' => 'El nombre del rol es requerido',
            'roleName.unique' => 'El role ya existe',
            'roleName.min' => 'El nombre del rol debe tener al menos 2 caracteres',
        ];

        $this->validate($rules, $messages);

        Role::create(['name' => $this->roleName]);

        $this->emit('role-added', 'El rol ha sido registrado');
        $this->resetUI();
    }

    public function Edit(Role $role)
    {
        
        $this->selected_id = $role->id;
        $this->roleName = $role->name;

        $this->emit('show-modal', 'show modal');
    }

    public function UpdateRole()
    {
        $rules = ['roleName' => "required|min:2|unique:roles,name,{$this->selected_id}"];
        $messages = [
            'roleName.required' => 'El nombre del rol es requerido',
            'roleName.unique' => 'El role ya existe',
            'roleName.min' => 'El nombre del rol debe tener al menos 2 caracteres',
        ];

        $this->validate($rules, $messages);     

        $role = Role::find($this->selected_id);
        $role->name = $this->roleName;
        $role->save();   

        $this->emit('role-updated', 'Se actualizó el rol con exito');
        $this->resetUI();
    }

    protected $listeners = ['destroy' => 'Destroy'];

    public function Destroy($id)
    {
        $permissionsCount = Role::find($id)->permissions->count();
        if($permissionsCount > 0)
        {
            $this->emit('role-error', 'No se puede eliminar el rol porque tiene permisos asociados');
            return;
        }

        Role::find($id)->delete();
        $this->emit('role-deleted', 'Se eliminó el role con exito');
    }

    public function AsignarRoles($rolesList)
    {
        if($this->userSelected > 0)
        {
            $user = User::find($this->userSelected);
            if($user){
                $user->syncRoles($rolesList);
                $this->emit('msg-ok', 'Roles asignados correctamente');
                $this->resetInput();
            }
        }
    }

    public function resetUI()
    {
        $this->roleName = '';
        $this->search = '';
        $this->selected_id=0;
    }
}
