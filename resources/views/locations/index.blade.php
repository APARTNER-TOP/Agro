<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h1>All Information About Devices</h1>

@foreach ($locations as $location)
<li> {{ $location}}  </li>
@endforeach

<h1>Only Names Of Devices</h1>

@foreach ($locations as $location)
<li> {{ $location->name}}  </li>
@endforeach

</body>
</html>
