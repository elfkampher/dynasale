<div class="row sales layout-top-spacing">
    
    <div class="col-sm-12">
    
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{$pageTitle}}</b>
                </h4>
                <ul class="tabs tabs-pills">
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                    
                </ul>
            </div>

            @include('common.searchbox')

            <div class="widget-content">
                
                <div class="table-responsive">
                        
                    <table class="table table-bordered table striped mt-1">
                        <thead class="text-white" style="background: #3B3F5C;">
                            <tr>
                                <th class="table-th text-white">ID</th>
                                <th class="table-th text-white">Descripción</th>                                
                                <th class="table-th text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td><h6>{{ $role->id }}</h6></td>
                                <td class="text-center">
                                    <h6>{{ $role->name }}</h6>
                                </td>
                                <td class="text-center">
                                    <a href="javcascript:void(0)" 
                                    wire:click="Edit({{ $role->id }})"
                                    class="btn btn-dark mtmobile" title="Editar Registro">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    onclick="Confirm('{{ $role->id }}')" 
                                    class="btn btn-dark"  title="Eliminar Registro">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $roles->links() }}

                </div>

            </div>

        </div>

    </div>
    @include('livewire.roles.form')

</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('role-added', Msg=> {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('role-updated', Msg=> {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('role-deleted', Msg=> {            
            noty(Msg)
        })
        window.livewire.on('role-exist', Msg=> {            
            noty(Msg)
        })
        window.livewire.on('role-error', Msg=> {            
            noty(Msg)
        })
        window.livewire.on('hide-modal', Msg=> {
            $('#theModal').modal('hide')            
        })
        window.livewire.on('show-modal', Msg=> {
            $('#theModal').modal('show')            
        })
    });

    swal({
        title: 'CONFIRMAR',
        text: '¿Confirmas Eliminar El Registro?',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cerrar',
        cancelButtonColor: '#fff',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#3B3F5C'
    }).then(function(result){
        if(result.value){
            window.livewire.emit('deleteRow', id)
            swal.close()
        }
    })
</script>