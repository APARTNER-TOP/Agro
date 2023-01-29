<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h1>All Information About Locations</h1>

@foreach ($locations as $location)
<li> {{ $location}}  </li>
@endforeach

<h1>Locations</h1>

@foreach ($locations as $location)
<li> {{ $location->company }} : {{ $location->address }} </li>
@endforeach

</body>
</html>
