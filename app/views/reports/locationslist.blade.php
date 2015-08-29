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
<h1>Location Details</h1>
</div>

<br><br><br><br><br>

<div>
	<table cellpadding='4' cellspacing='0' width="80%" align='center'>
		<thead>
			<tr>
				<th width="10%" style='color:blue'>Code</th>
				<th width="10%" style='color:blue'>Name</th>
				<th width="10%" style='color:blue'>Type</th>
				<th width="10%" style='color:blue'>Parent Location</th>
			</tr>
		</thead>
		<tbody>
			@foreach($locations as $i => $location)
			<tr>
				<td align="center" style="color:green">{{ $location->code }}</td>
				<td align="center" style="color:green">{{ $location->name }}</td>
				<td align="center" style="color:green">{{ $location->type->name }}</td>
				<td align="center" style="color:green">{{ $location->parent_name }}</td>
			</tr>
			@endforeach
			
			@if(count($locations) == 0)
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