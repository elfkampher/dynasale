@include('common.modalHead')

<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label>Nombre</label>
			<input type="txt" wire:model.lazy="name" class="form-control" placeholder="ej: Juan Carlos">
			@error('name')<span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label>Telefono</label>
			<input type="txt" wire:model.lazy="phone" class="form-control" placeholder="ej: 555 555 55 55" maxlength="10">
			@error('phone')<span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label>Email</label>
			<input type="txt" wire:model.lazy="email" class="form-control" placeholder="ej: contacto@encodyne.com">
			@error('email')<span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label>Contraseña</label>
			<input type="password" wire:model.lazy="password" 
			class="form-control">
			@error('password')<span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label>Status</label>
			<select wire:model.lazy="status" class="form-control">
				<option value="Elegir">Elegir</option>
				<option value="Active">Active</option>
				<option value="Locked">Bloqueado</option>
			</select>
			@error('status')<span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label>Asignar Role</label>
			<select wire:model.lazy="profile" class="form-control">
				<option value="Elegir" selected>Elegir</option>
				@foreach($roles as $role)
				<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach				
			</select>
			@error('profile')<span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="form-group">
			<label>Imagen de Perfil</label>
			<input type="file" wire:model="image" accept="image/x-png, image/x-jpeg, image/gif" class="form-control">
			@error('image')<span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>
</div>

@include('common.modalFooter')