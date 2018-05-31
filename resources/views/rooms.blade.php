<html>
    <div>
        <ul>
            @foreach $user->rooms as $room 

                <li>
                    {{ $room }}
                </li>

            @endforeach
        </ul>
    </div>
</html>