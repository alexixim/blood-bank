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
<h1>Donor Details</h1>
</div>

<br><br><br><br>

<div>
	<table cellpadding='4' cellspacing='0' width="80%" align='center' >
		<thead>
			<tr>
				<th width="10%" style='color:blue'>Name</th>
				<th width="10%" style='color:blue'>DOB</th>
				<th width="10%" style='color:blue'>Blood Group</th>
				<th width="10%" style='color:blue'>Gender</th>
				<th width="10%" style='color:blue'>Last Donation On</th>
			</tr>
		</thead>
		<tbody>
			@foreach($donors as $i => $donor)
			<tr>
				<td align="center" style="color:green">{{ $donor->name }}</td>
				<td align="center" style="color:green">{{ $donor->dob }}</td>
				<td align="center" style="color:green">{{ $donor->blood_group->name }}</td>
				<td align="center" style="color:green">{{ $donor->gender_name }}</td>
				<td> 
					<abbr title="{{ (count($donor->donations)) ? $donor->donations->last()->donated_at : '' }}">
						{{ (count($donor->donations)) ? $donor->donations->last()->donated_at->diffForHumans() : '' }}
					</abbr>
				</td>
			</tr>
			@endforeach
			
			@if(count($donors) == 0)
			<tr>
				<td colspan="5">No matching results found!</td>
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