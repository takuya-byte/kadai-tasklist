@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
            {!! link_to_route('tasks.index', 'タスク一覧', [], ['class' => 'btn btn-primary']) !!}

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the tasklist</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection