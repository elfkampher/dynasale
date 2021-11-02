<div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="theModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white">
          <b>{{ $componentName }}</b> | {{ $selected_id > 0 ? 'Editar': 'Crear' }}
        </h5>
        <h6 class="text-center text-warning" wire:loading>Espere por favor</h6>
      </div>
      <div class="modal-body">

        <div class="row">
  
          <div class="col-sm-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <span class="fas fa-edit">
                    
                  </span>
                </span>
              </div>
              <input type="text" wire:model.lazy="permissionName" class="form-control" placeholder="ej: Category_index" maxlength="255">
            </div>
            @error('permissionName') <span class="text danger er">{{ $message }}</span>@enderror
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info" data-dismiss="modal">Cerrar</button>
        
        @if($selected_id < 1)
        <button type="button" wire:click.prevent="CreatePermission()" class="btn btn-dark close-modal" >Guardar</btn>
        @else
        <button type="button" wire:click.prevent="UpdatePermission()" class="btn btn-dark close-modal" >Actualizar</btn>
        @endif
      </div>
    </div>
  </div>
</div>  