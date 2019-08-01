@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add New User
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('users.update', $model->id) }}">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$model->name}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Last Name:</label>
                    <input type="text" class="form-control" name="lastname" value="{{$model->lastname}}" required/>
                </div>
                <h2>Phones</h2>
                @foreach($model->phones as $phone)
                <div class="form-group">
                    <label for="price">Phone:</label>
                    <input type="text" class="form-control" name="phones[]" value="{{$phone->number}}" required/>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
