<html>

<head>

<style>
body {
    
    font:1em normal Arial,sans-serif;
    background-color:#FCEE9E;
    margin:100px 0px 0px 0px;
    text-align:center;
}

table,th,td {
  border: solid 1px #848484;
}

div#fixedheader {
    position:fixed;
    text-align: center;
    top:0px;
    left:0px;
    width:100%;
    color:white;
    background:#333;
    padding:20px;
}
div#fixedfooter {
    position:fixed;
    text-align: center;
    bottom:0px;
    left:0px;
    width:100%;
    color:white;
    background:#333;
    padding:-20px;
}
</style>

</head>

<body>

<div id="fixedheader">
<h1>Product Details</h1>
</div>

<br><br><br><br><br>

<div>
	<table cellpadding='4' cellspacing='0' width="80%" align='center' >
		<thead>
			<tr>
				<th width="20%" style='color:#0040FF'>Name</th>
				<th width="20%" style='color:#0040FF'>Category</th>
				<th width="20%" style='color:#0040FF'>Quantity</th>
				<th width="20%" style='color:#0040FF'>Donations Count</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $i => $product)
			<tr>
				<td align="center" style="color:#04B45F">{{ $product->name }}</td>
				<td align="center" style="color:#04B45F">{{ $product->category->name }}</td>
				<td align="center" style="color:#04B45F">{{ $product->quantity }}</td>
				<td align="center" style="color:#04B45F">{{ count($product->donations) }}</td>
			</tr>
			@endforeach
			
			@if(count($products) == 0)
			<tr>
				<td colspan="4">No matching results found!</td>
			</tr>
			@endif
		</tbody>
	</table>
</div>

<br>

<div style="text-align: center;">
<input type="button" style="background-color:#F7D358; font-weight:bold; height: 30px; width: 100px" value="Back" onClick="history.go(-1);return true;">
</div>

<div id="fixedfooter">
One Blood
</div>

</body>
</html>







