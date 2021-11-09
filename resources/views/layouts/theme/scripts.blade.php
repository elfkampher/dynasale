<script src="{{ asset('assets/js/loader.js') }}"></script>
<script src="{{ asset('js/onscan.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('plugins/nicescroll/nicescroll.js') }}"></script>
<script src="{{ asset('plugins/dmauro/keypress.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script src="{{ asset('plugins/currency/currency.js') }}"></script>
<script src="https://kit.fontawesome.com/cc12fe165b.js" crossorigin="anonymous"></script>

<script>
    function noty(msg, option = 1)
    {
        Snackbar.show({
            text: msg.toUpperCase(),
            actionText: 'Cerrar',
            actionTextColor: '#fff',
            backgroundColor:  option == 1 ? '#3b3f5c' : '#e7515a',
            pos: 'top-right'
        });
    }
</script>

<script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>

@livewireScripts