@extends('layouts.app')

@section('content')




<div class="container">
    
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

           <div class="card card-signin my-5">
            <div class="card-body">
                 <h5 class="card-title text-center">Iniciar Sesión</h5>

                     <div class="form-label-group">

                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label" style="text-align: center;">E-Mail</label>

                            <div class="form-label-group">
                                <input id="email" type="email" class="form-control form-control" style="text-align:center;" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                    <div class="form-label-group">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label" style="text-align: center;">Contraseña</label>

                            <div class="form-label-group">
                                <input id="password" type="password" class="form-control form-control" style="text-align: center;" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

<br>

                <div class="form-label-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                  
               <button type="submit" class="btn btn-primary btn-block ">
                                    Iniciar Sesión
               </button>
                     

                    </form>
                </div>



            </div>

        </div>
    </div>
</div>
</div>
@endsection
