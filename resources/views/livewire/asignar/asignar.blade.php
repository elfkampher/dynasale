<div class="row sales layout-top-spacing">
    
    <div class="col-sm-12">
    
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }}</b>
                </h4>
                
            </div>
            


            <div class="widget-content">
                <div class="form-inline">
                    <div class="form-group mr-5">
                        <select wire:model="role" class="form-control">
                            <option value="Elegir" selected>Selecciona el Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>    
                            @endforeach
                        </select>
                    </div>

                    <button wire:click.prevent="SyncAll()" type="button" class="btn btn-dark mbmobile inblock mr-5">Sincronizar Todos</button>
                    <button onclick="Revocar()" type="button" class="btn btn-dark mbmobile mr-5">Revocar Todos</button>
                </div>
                
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                        
                            <table class="table table-bordered table striped mt-1">
                                <thead class="text-white" style="background: #3B3F5C;">
                                    <tr>
                                        <th class="table-th text-white text-center">ID</th>
                                        <th class="table-th text-white text-center">Permiso</th>
                                        <th class="table-th text-white text-center">Roles con el permiso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permisos as $permiso)
                                    <tr>
                                        <td><h6 class="text-center">{{ $permiso->id }}</h6></td>
                                        <td>
                                            
                                            <div class="n-check">
                                                <label class="new-control new-checkbox checkbox-primary">
                                                    <input type="checkbox" 
                                                    whire:change="SyncPermiso($('#p' + {{ $permiso->id }}).is(':checked'), '{{ $permiso->name }}')"
                                                    id="p{{ $permiso->id }}"
                                                    value="{{ $permiso->id }}" 
                                                    class="new-control-input"
                                                    {{ $periso->checked == 1 ? 'checked' : '' }} 
                                                    >
                                                    <span class="new-control-indicator"></span>
                                                    <h6>{{ $permiso->name }}</h6>
                                                </label>
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            <h6>{{ \App\Models\User::permission($permiso->name)->count() }}</h6>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $permisos->links() }}
                            

                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

    </div>
    Include Form

</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('sync-error', Msg => {
            noty(Msg)
        })
        window.livewire.on('permi', Msg => {
            noty(Msg)
        })
        window.livewire.on('syncall', Msg => {
            noty(Msg)
        })
        window.livewire.on('removeall', Msg => {
            noty(Msg)
        })
    });

    function Revocar()
    {
        if(products>0)
        {
            swal({
                title: 'Error',
                type: 'error',
                text:'No se puede eliminar la categoria, porque tiene productos relacionados'})
            return;
        }
        swal({
            title: 'CONFIRMAR',
            text: '¿Confirmas revocar todos los permisos?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#3B3F5C'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('revokeall', id)
                swal.close()
            }
        })
    }
</script>