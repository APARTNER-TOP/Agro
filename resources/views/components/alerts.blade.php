@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
    </div>
@endif
