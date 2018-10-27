<ul>

    @foreach($challenges as $challenge)
        <li> {{ $challenge->name }} </li>
    @endforeach
</ul>
