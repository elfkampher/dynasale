<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget">
            <div class="widget-heading">
                <h4 class="card-title text-center"><b>{{ $componentName }}</b></h4>
            </div>

            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="col-sm-12">
                            <h6>Elige el usuario</h6>
                            <div class="form-group">
                                <select wire:model="userId" class="form-control">
                                    <option value="0">Todos</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h6>Elige el tipo de reporte</h6>
                            <div class="form-group">
                                <select wire:model="reportType" class="form-control">
                                    <option value="1">Ventas por dia</option>
                                    <option value="2">Ventas por fecha</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h6>Fecha desde</h6>
                            <div class="form-group">
                                <input class="form-control flatpickr" type="text" wire:model="dateFrom" placeholder="Click para elegir"></input>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h6>Fecha Hasta</h6>
                            <div class="form-group">
                                <input class="form-control flatpickr" type="text" wire:model="dateTo" placeholder="Click para elegir"></input>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button class="btn btn-dark btn-block" wire:click="$refresh">
                                Consultar
                            </button>

                            <a href="{{ url('report/pdf'. '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo ) }}" class="btn btn-dark btn-block {{ count($data) < 1 ? 'disabled' : '' }}" 
                            target="_blank">Generar PDF</a>

                            <a href="{{ url('report/pdf'. '/' . $userId . '/' . $reportType . '/' . $dateFrom . '/' . $dateTo ) }}" 
                            class="btn btn-dark btn-block {{ count($data) < 1 ? 'disabled' : '' }}" target="_blank">Exportar a Excel</a>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-9">
                        <!--TABLA-->
                        <div class="table-responsive">
                        
                            <table class="table table-bordered table striped mt-1">
                                <thead class="text-white" style="background: #3B3F5C;">
                                    <tr>
                                        <th class="table-th text-white text-center">Folio</th>
                                        <th class="table-th text-white text-center">Total</th>
                                        <th class="table-th text-white text-center">Items</th>
                                        <th class="table-th text-white text-center">Status</th>
                                        <th class="table-th text-white text-center">Usuario</th>
                                        <th class="table-th text-white text-center">Fecha</th>
                                        <th class="table-th text-white text-center" width="50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($data) < 1)
                                    <tr><td colspan="7"><h5>Sin resultados</h5></td></tr>
                                    @endif
                                    @foreach($data as $d)
                                    <tr>
                                        <td class="text-center"><h6>{{ $d->id }}</h6></td>
                                        <td class="text-center"><h6>{{ number_format($d->total, 2) }}</h6></td>
                                        <td class="text-center"><h6>{{ $d->items }}</h6></td>
                                        <td class="text-center"><h6>{{ $d->status }}</h6></td>
                                        <td class="text-center"><h6>{{ $d->user }}</h6></td>
                                        <td>
                                            <h6>
                                                {{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}
                                            </h6>
                                        </td>
                                        <td class="text-center" width="50px">
                                            <button wire:click.prevent="getDetails({{ $d->id }})"
                                            class="btn btn-dark btn-sm">
                                                <i class="fas fa-list"></i>
                                            </button>
                                        </td>

                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.reports.sales-detail')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        flatpickr(document.getElementsByClassName('flatpickr'),{
            enableTime: false,
            dateFormat: 'Y-m-d',
            locale: {
                firstDayofWeek: 1,
                weekdays: {
                    shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                    longhand: [
                      "Domingo",
                      "Lunes",
                      "Martes",
                      "Miércoles",
                      "Jueves",
                      "Viernes",
                      "Sábado",
                    ],
                },
                months: {
                    shorthand: [
                      "Ene",
                      "Feb",
                      "Mar",
                      "Abr",
                      "May",
                      "Jun",
                      "Jul",
                      "Ago",
                      "Sep",
                      "Oct",
                      "Nov",
                      "Dic",
                    ],
                    longhand: [
                      "Enero",
                      "Febrero",
                      "Marzo",
                      "Abril",
                      "Mayo",
                      "Junio",
                      "Julio",
                      "Agosto",
                      "Septiembre",
                      "Octubre",
                      "Noviembre",
                      "Diciembre",
                    ],
                },

            }
        })

        //eventos
        window.livewire.on('show-modal', Msg =>{
            $('#modalDetails').modal('show')
        })
    })
    
</script>


