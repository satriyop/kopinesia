<h2>Daftar Supplier</h2>
<table border="1" cellspacing="0" width="100%">
	<tr>
		<td>Id Supplier</td>
		<td>Nama Supplier</td>
		<td>Alamat Supplier</td>
		<td>Telpon</td>
	</tr>

	
	@foreach ($pensupply as $data)
	
	<tr>
		<td>
			{{ $data->id_supplier }}
		</td>
		<td>
			{{ $data->nama_supplier }}
		</td>
		<td>
			{{$data->alamat}}
		</td>
		<td>
			{{ $data->telpon }}
		</td>
	</tr>


	@endforeach