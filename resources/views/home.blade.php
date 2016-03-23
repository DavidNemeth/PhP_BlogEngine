@extends('layouts.master') @section('content')
    <div class="centered">
        @foreach($actions as $action)
            <a href="{{ route('niceaction',['action' => lcfirst($action->name)]) }}">{{ $action->name }}</a>
        @endforeach
        <br />
        <br />
        @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('add_action') }}" method="post">
            <label>Name of Action:</label>
            <input type="text" name="name"/>
            <label>Niceness:</label>
            <input type="text" name="niceness"/>
            <button type="submit">Do a nice action</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
@endsection