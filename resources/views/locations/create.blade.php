<h1>Create New Devices</h1>
<div class="container">
    <form method="POST" action="/locations/action">

        {{ csrf_field() }}

        <div>
            <label>Device Name</label>
            <input type="text" name="name" placeholder="Device Name">
        </div>
        <!-- <div>
            <label >Device Description</label>
            <textarea name="description" placeholder="Device Description"></textarea>
        </div> -->
        <div>
            <input type="submit" value="Make Device">
        </div>
    </form>
</div>
