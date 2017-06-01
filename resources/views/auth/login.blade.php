@extends('layouts.app')

@section('content')
    <section class="hero is-default is-fullheight">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered">Mnemosine</h1>

                <div class="container">
                    <div class="columns">
                        <div class="column"></div>

                        <div class="column is-3">
                            <form method="post" action="@{{ route('login') }}">
                                @{{ csrf_field() }}

                                <div class="field">
                                    <p class="control has-icon">
                                        <input class="input" type="text" id="username" name="username" placeholder="Username" autofocus>

                                        <span class="icon is-small is-left">
                                          <i class="fa fa-user"></i>
                                        </span>
                                    </p>

                                    @if($errors->has('username'))
                                        <p class="help is-danger">
                                            @{{ $errors->first('username') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="field">
                                    <p class="control has-icon">
                                        <input class="input" type="password" id="password" name="password" placeholder="Password">

                                        <span class="icon is-small is-left">
                                          <i class="fa fa-lock"></i>
                                        </span>
                                    </p>

                                    @if($errors->has('password'))
                                        <p class="help is-danger">
                                            @{{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <button class="button is-success">
                                            Login
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>

                        <div class="column"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection