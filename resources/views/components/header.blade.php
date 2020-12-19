<div>
    @foreach ($biodata as $key => $val)
        <li>{{ ucfirst($key) }} - {{ $val }}</li>
    @endforeach
    <hr/>
    <h4>All Rights Reserved {{ $name }}</h4>
</div>
