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
<h1>Donation Details</h1>
</div>

<br><br><br><br><br>

<div>
	<table cellpadding='4' cellspacing='0' width="80%" align='center' >
		<thead>
			<tr>
				<th width="10%" style='color:blue'>Donor</th>
				<th width="10%" style='color:blue'>Product Category</th>
				<th width="10%" style='color:blue'>Product</th>
				<th width="10%" style='color:blue'>Quantity</th>
				<th width="10%" style='color:blue'>Location</th>
				<th width="10%" style='color:blue'>Donated On</th>
			</tr>
		</thead>
		<tbody>
			@foreach($donations as $i => $donation)
			<tr>
				<td>
					@if($donation->donor->trashed())
					{{ $donation->donor->name }}
					@else
					<a href="#">
					{{ $donation->donor->name }}
					</a>
					@endif
				</td>
				<td align="center" style="color:green">{{ $donation->product->category->name }}</td>
				<td align="center" style="color:green">{{ $donation->product->name }}</td>
				<td align="center" style="color:green">{{ $donation->quantity }}</td>
				<td align="center" style="color:green">{{ $donation->location->name_with_code }}</td>
				<td align="center" style="color:green">{{ $donation->donated_at }}</td>
			</tr>
			@endforeach
			
			@if(count($donations) == 0)
			<tr>
				<td colspan="6">No matching results found!</td>
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
