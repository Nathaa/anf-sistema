@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                {!! Form::model($cuenta, ['route'=> ['cuentas.update', $cuenta->id],
                'method' =>'PUT'])  !!}
                <enctype="multipart/form-data">

                @include('cuentas.form')
                {!! Form::close() !!}
            </table>
        </div>
    </div>
</div>
@endsection
