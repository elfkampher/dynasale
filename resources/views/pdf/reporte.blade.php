<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reporte de Ventas</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom_pdf.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom_page.css') }}">
</head>
<body>
<section class="header" style="top:-287px">
	<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td colspan="2" class="text-center">
				<span style="font-size: 25px; font-weight: bold;">Dynasale</span>
			</td>
		</tr>
		<tr>
			<td width="30%" style="vertical-align: top; padding-top: 10px; position: relative;">
				<img src="{{ asset('assets/img/encodyne.png') }}" alt="" class="invoice.logo">
			</td>

			<td width="70%" class="text-left text-company" style="vertical-align: top; padding-top: 10px;">
				@if($reportType == 0)
				<span style="font-size: 16px"><strong>Reporte de Ventas del Día</strong></span>
				@else
				<span style="font-size: 16px"><strong>Reporte de Ventas por Fechas</strong></span>
				@endif
				<br>
				@if($reportType != 0)
					<span style="font-size: 16px"><strong>Fecha de Consulta: {{ $dateFrom }} al {{ $dateTo }}</strong></span>
				@else
					<span style="font-size: 16px"><strong>Fecha de Consulta: {{ \Carbon\Carbon::now()->format('d-M-Y') }}</strong></span>
				@endif
				<br>
				<span style="font-size: 14px"><strong>Usuario: {{ $user }}</strong></span>
			</td>
		</tr>
	</table>
</section>

<section style="margin-top: -110px;">
	<table cellpadding="0" cellspacing="0" class="table-items" width="100%">
		<thead>
			<tr>
				<td width="10%">Folio</td>
				<td width="12%">Importe</td>
				<td width="10%">Items</td>
				<td width="12%">Estatus</td>
				<td>Usuario</td>
				<td width="18%">Fecha</td>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $item)
			<tr>
				<td align="center">{{ $item->id }}</td>
				<td align="center">{{ number_format($item->total, 2) }}</td>
				<td align="center">{{ $item->items }}</td>
				<td align="center">{{ $item->status }}</td>
				<td align="center">{{ $item->user }}</td>
				<td align="center">{{ $item->created_at }}</td>				
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td class="text-center">
					<span><b>Totales</b></span>
				</td>
				<td colspan="1">
					<span>${{ number_format($data->sum('total'), 2) }}</span>
				</td>
				<td class="text-center">
					{{ $data->sum('items') }}
				</td>
				<td colspan="3">
					
				</td>
			</tr>
		</tfoot>
	</table>
</section>

<section class="footer">
	<table cellpadding="0" cellspacing="0" class="table-items" width="100%">
		<tr>
			<td width="20%">
				<span>Dynasale v1.0</span>
			</td>
			<td width="60%" class="text-center">
				Encodyne
			</td>
			<td class="text-center" width="20%">
				Pagina <span class="pagenum"></span>
			</td>
		</tr>
	</table>
</section>

</body>
</html>