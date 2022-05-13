<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h1 style="text-align:center;"><a href="{{route('home')}}">Home</a></h1>
<h2 style="text-align:center;">Role table</h2>
	<table>
			<tr>
				<th>Company</th>
				<th>Contact</th>
				<th>Country</th>
			</tr>
			@foreach($data as $datas)
			<tr>
				<td>{{$datas->id}}</td>
				<td>{{$datas->role_name}}</td>
				<td>{{$datas->created_at}}</td>
			</tr>	  
			@endforeach
	</table>

</body>
</html>

