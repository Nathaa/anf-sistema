@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">



   
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

           <div class="card card-signin my-5">
            <div class="card-body">
                 <h5 class="card-title text-center">Registrarse</h5>




                    <div class="form-label-group">



                    <form class="form-signin" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">





                            <label for="name" class="control-label">Nombre</label>


                            <div class="form-label-group">
                                <input id="name" type="text" class="form-control" style="text-align: center;" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail</label>

                            <div class="form-label-group">
                                <input id="email" type="email" class="form-control" style="text-align: center;" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Contraseña</label>

                            <div class="form-label-group">
                                <input id="password" type="password" class="form-control" style="text-align: center;" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirmar Contraseña</label>

                            <div class="form-label-group">
                                <input id="password-confirm" type="password" class="form-control" style="text-align: center;" name="password_confirmation" required>
                            </div>
                        </div>

                            <br>

                                <button type="submit" class="btn btn-primary btn-block">
                                    Registrarse
                                </button>
                 



                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>




@endsection
