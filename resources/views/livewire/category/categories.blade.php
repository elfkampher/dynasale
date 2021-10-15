<div class="row sales layout-top-spacing">
    
    <div class="col-sm-12">
    
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tab tabs-pills">
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
                                <th class="table-th text-white">Descripción</th>
                                <th class="table-th text-white">Imagen</th>
                                <th class="table-th text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td><h6>{{ $category->name }}</h6></td>
                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/categories/'.$category->image) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javcascript:void(0)" 
                                        wire:click="Edit({{ $category->id }})"
                                        class="btn btn-dark mtmobile" title="edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    onClickc="Confirm('{{ $category->id }}')"
                                    class="btn btn-dark"  title="delete">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}

                </div>

            </div>

        </div>

    </div>
    @include('livewire.category.form')

</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('category-added', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        });
        window.livewire.on('category-updated', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        });
        window.livewire.on('category-added', msg => {            
            noty(msg)
        });
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide');
            
        });
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
            
        });
        window.livewire.on('hiden.bs.modal', msg => {
            $('.err').css('display','none');
            
        });
    });

    function Confirm(id)
    {
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
    }
</script>