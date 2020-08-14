<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Agenda Médica</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page" style="background-image: url('imagens/6274.jpg'); background-repeat: no-repeat; background-position: center; background-size: 100%;">
<div class="login-box">
    <div class="login-logo" style="width: 400px">
        <a href="{{ url('/home') }}">Agenda Médica</a>
        
    </div>
    
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">REDEFINIR SENHA - Preencha corretamente os dados abaixo:</p>
        @include('flash::message')
        {{--<div id="erros">
             <div class="alert
                    alert-danger
                    " role="alert">
            
            Usuário não encontrado.
            </div> 
        </div>--}}
        <form method="POST" action="{{ route('senha.altera') }}">
            {!! csrf_field() !!}

            {{-- <div class="form-group has-feedback">
                <input type="text" class="form-control" name="login" id="login" placeholder="Login">
            </div> --}}

            {{-- <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}"> --}}
            {{-- <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div> --}}

            <div class="form-group has-feedback">
                <input placeholder="E-mail" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}"> --}}
            <div class="form-group has-feedback">
                <input placeholder="Senha Atual" id="senhaatual" type="password" class="form-control @error('senha') is-invalid @enderror" name="senhaatual" required autocomplete="Senha Atual">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @error('senhaatual')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input placeholder="Nova Senha" id="senhanova" type="password" class="form-control @error('senha') is-invalid @enderror" name="senhanova" required autocomplete="Nova Senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @error('senhanova')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group has-feedback">
                <input placeholder="Confirme a Nova Senha" id="senhanovaconfirma" type="password" class="form-control @error('senha') is-invalid @enderror" name="senhanovaconfirma" required autocomplete="Confirme a Nova Senha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @error('senhanova')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                {{-- <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Lembre-me
                        </label>
                    </div>
                </div> --}}
                <!-- /.col -->
                <style>
                    #botao{ text-align: center }
                    .botaoEnviar{
                        /* width: 350px; */
                        text-align: center;
                        /* padding: 15px 20px; */
                        /* border: 1px solid #eee; */
                        /* border-radius: 6px; */
                        /* background-color: #FCC302; */
                        /* font-size: 18px; */
                    }
                </style>
                <div class="col-xs-4" id="botao">
                    <button type="submit" id="entrar" class="btn btn-primary btn-block btn-flat botaoEnviar">Entrar</button>

                </div>
                <div class="form-group col-sm-12" id="voltar">
                    <br>
                    <a href="{{ route('login') }}">Voltar</a>
                </div>
                <!-- /.col -->
            </div>
        </form>


    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>


<script type="text/javascript">
    $( document ).ready(function() {
        // Handler for .ready() called.
        if ($("#selecione").val() == "C") {
                document.getElementById("login").placeholder = "Informe o CNPJ da empresa";
        } else {
            document.getElementById("login").placeholder = "Login";
        }
    });
        $("#selecione").change(function() {
            if ($("#selecione").val() == "C") {
                document.getElementById("login").placeholder = "Informe o CNPJ da empresa";
            } else {
                document.getElementById("login").placeholder = "Login";
            }
        });


        // $(function () {
        //     $('input').iCheck({
        //         checkboxClass: 'icheckbox_square-blue',
        //         radioClass: 'iradio_square-blue',
        //         increaseArea: '20%' // optional
        //     });
        // });
</script>
</body>
</html>
