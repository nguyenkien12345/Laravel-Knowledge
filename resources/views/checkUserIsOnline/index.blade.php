{{-- Cách 1: Dùng Helper--}}
{{--
<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach ($users as $user)
                <p> ID: {{ $user->user_id }} </p>
                <p> Name: {{ $user->name }} </p>
                <p> Email: {{ $user->email }} </p>
                <p> Status: {{ Helpers::check_user_is_online($user->user_id) }} </p>
            @endforeach
        </div>
    </div>
</div>
--}}

{{-- Cách 2: Dùng phương thức được định nghĩa trong model --}}
<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach ($users as $user)
                <p> ID: {{ $user->user_id }} </p>
                <p> Name: {{ $user->name }} </p>
                <p> Email: {{ $user->email }} </p>
                @if ($user->checkUserIsOnline())
                    <p>User is online</p>
                @else
                    <p>User is offline</p>
                @endif
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @php
                $totalUserOnline = 0;
            @endphp
            @foreach ($users as $user)
                @if ($user->checkUserIsOnline())
                    @php
                        $totalUserOnline = $totalUserOnline + 1;
                    @endphp
                @endif
            @endforeach
            <p>Total User: {{count($users)}} </p>
            <p>Total User Is Online: {{$totalUserOnline}}</p>
            <p>Total User Is Offline: {{count($users) - $totalUserOnline}}</p>
        </div>
    </div>
</div>



