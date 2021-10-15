</div>
      <div class="modal-footer">
        <button type="button" wire:click.prevent="resetUI()" class="btn btn-dark close-btn text-info" data-dismiss="modal">Cerrar</button>
        
        @if($selected_id < 1)
        <button type="button" wire:click.prevent="Store()" class="btn btn-dark close-modal" >Guardar</btn>
        @else
        <button type="button" wire:click.prevent="Update()" class="btn btn-dark close-modal" >Actualizar</btn>
        @endif
      </div>
    </div>
  </div>
</div>