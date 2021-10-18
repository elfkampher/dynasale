<div class="row sales layout-top-spacing">
    
    <div class="col-sm-12">    
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
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
                                <th class="table-th text-white">Descripción</th>
                                <th class="table-th text-white">Codigo</th>
                                <th class="table-th text-white">Precio</th>
                                <th class="table-th text-white">Stock</th>
                                <th class="table-th text-white">Stock Min</th>
                                <th class="table-th text-white">Categoria</th>
                                <th class="table-th text-white">Imagen</th>                                
                                <th class="table-th text-white">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $product)
                            <tr>
                                <td><h6>{{ $product->name }}</h6></td>
                                <td><h6>{{ $product->barcode }}</h6></td>                                
                                <td><h6>{{ $product->price }}</h6></td>
                                <td><h6>{{ $product->stock }}</h6></td>
                                <td><h6>{{ $product->alerts }}</h6></td>                                
                                <td><h6>{{ $product->category }}</h6></td>

                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/products/'.$product->imagen) }}" alt="ejemplo" height="70" width="80" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="javcascript:void(0)" 
                                        wire:click="Edit({{ $product->id }})"
                                        class="btn btn-dark mtmobile" title="edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    
                                    <a href="javascript:void(0)" 
                                    onclick="Confirm('{{ $product->id }}', {{ $product->ventas }})"
                                    class="btn btn-dark"  title="delete">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $data->links() }}

                </div>

            </div>

        </div>

    </div>
    @include('livewire.product.form')

</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('product-added', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        });
        window.livewire.on('product-deleted', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        });
        window.livewire.on('product-updated', msg => {
            $('#theModal').modal('hide');
            noty(msg)
        });
        window.livewire.on('product-added', msg => {            
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

    function Confirm(id, ventas)
    {
        if(ventas>0)
        {
            swal({
                title: 'Error',
                type: 'error',
                text:'No se puede eliminar el producto, porque tiene ventas relacionadas'})
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