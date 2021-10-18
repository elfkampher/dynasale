<div>
<style type="text/css"></style>

<div class="row layout-top-spacing">
    
    <div class="col-sm-12 col-md-8">
    <!--DETALLES-->
    @include('livewire.pos.partials.detail')    
    </div>
    
    <div class="col-sm-12 col-md-4">
    <!--TOTAL-->
    @include('livewire.pos.partials.total') 

    <!--DENOMINATIONS-->
    @include('livewire.pos.partials.coins')       
    </div>
</div>

</div>

@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')
@include('livewire.pos.scripts.shortcuts')
