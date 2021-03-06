<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div><br>
        @endif

        <table>
            <thead>
            <tr>
                <th>Name:</th>
                <th>Last Name:</th>
                <th>Phones:</th>
                <th>Registred At:</th>
                <th>Actions:</th>
            </tr>
            </thead>
            <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{$model->name}}</td>
                        <td>{{$model->lastname}}</td>
                        <td>
                            @foreach($model->phones as $phone)
                                {{$phone->number}}
                            @endforeach
                        </td>
                        <td>{{$model->created_at}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('users.show',$model->id)}}" title=""
                                    class="btn btn-primary btn-sm" role="button">Show</a><br>
                                <a href="{{ route('users.edit',$model->id)}}" title=""
                                    class="btn btn-primary" role="button">
                                    <i class="fa fa-pencil"></i>Edit</a><br>
{{--                                <a href="users/{{$model->id}}/delete" title=""--}}
                                <form action="{{ route('users.destroy', $model->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table><br>

        <div class="links">
            <a href="{{ url('/') }}">Home</a>
        </div>
    </div>
</div>
</body>
</html>
