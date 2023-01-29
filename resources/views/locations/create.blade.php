<?php return false; ?>

<h1>Create New Locations</h1>
<div class="container">
    <div class="col-xl-6" id="location_create">
        <p>Оберіть Ваші Локації для торгівлі:</p>
        <ul id="location_type">
            @foreach ($locationsType as $locationType)
            <li data-id="{{ $locationType->id}}">
                <img src="/img/locations/{{ $locationType->id}}.png" alt="img" width="20" height="20" /> {{ $locationType->name}}
            </li>
            @endforeach
        </ul>
    </div>

    <form method="POST" action="/dashboard/locations/action">
        {{ csrf_field() }}
        @include ('components.locations.forms')

        <!-- <div>
            <label>Device Name</label>
            <input type="text" name="name" placeholder="Device Name">
        </div> -->
        <!-- <div>
            <label >Device Description</label>
            <textarea name="description" placeholder="Device Description"></textarea>
        </div> -->
        <div>
            <input type="submit" value="Make Location">
        </div>
    </form>
</div>

@include('components.script')
