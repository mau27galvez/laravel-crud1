<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        input
        {
            width: 100%;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card border-0 shadow">
                    @if( $errors->any() )
                        <div class="alert alert-danger">
                            @foreach( $errors->all() as $error )
                                -{{ $error }} <br>
                            @endforeach
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="form-row">
                                <div class="col-sm-3">
                                <input type="text" name="name" class="form-controll" placeholder="nombre" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" name="email" class="form-controll" placeholder="email" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-controll" placeholder="contraseña">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="Enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $users as $user )
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <input 
                                        type="submit" 
                                        value="Eliminar" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Desea eliminar?')"
                                    >
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>