<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('scan-ok', msg => {            
            noty(msg)
        });
        
        window.livewire.on('scan-notfound', msg => {            
            noty(msg, 2)
        });
        window.livewire.on('no-stock', msg => {            
            noty(msg, 2)
        });
        window.livewire.on('sale-error', msg => {            
            noty(msg)
        });
        window.livewire.on('print-ticket', saleId => {            
            window.open("print://" + saleId, '_blank')
        });
    });
    
</script>