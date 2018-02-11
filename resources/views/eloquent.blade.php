<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@foreach ($mahasiswa as $temp)
<h3>{{$temp->nama}}<small>[{{$temp->nim}}]</small></h3>
<h5>Hobi : 
@foreach($temp->hobi as $tampung)
<small>{{$tampung->hobi}}</small>
@endforeach
</h5>
<h4>
	<li>Nama Wali :{{$temp->wali->nama}} <strong></strong></li>
	<li>Dosen Pembingbing : <strong>{{$temp->dosen->nama}}</strong></li>
</h4>
<hr/>
@endforeach
</body>
</html>