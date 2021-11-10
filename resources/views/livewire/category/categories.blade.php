<div class="row sales layout-top-spacing">
    
    <div class="col-sm-12">
    
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tabs-pills">
                    @can('Category_Create')
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">
                        Agregar</a>
                    </li>
                    @endcan
                    
                </ul>
            </div>
            @can('Category_Search')
            @include('common.searchbox')
            @endcan
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
                                        <img src="{{ asset('storage/categories/'.$category->imagen) }}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    @can('Category_Update')
                                    <a href="javcascript:void(0)" 
                                        wire:click="Edit({{ $category->id }})"
                                        class="btn btn-dark mtmobile" title="edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    @endcan
                                    
                                    @can('Category_Destroy')
                                    <a href="javascript:void(0)" 
                                    onClick="Confirm('{{ $category->id }}', {{ $category->products->count() }})"
                                    class="btn btn-dark"  title="delete">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    @endcan
                                    
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
        window.livewire.on('category-deleted', msg => {
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

    function Confirm(id, products)
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