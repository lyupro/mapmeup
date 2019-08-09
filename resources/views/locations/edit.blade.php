@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Location
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
            <form method="post" action="{{ route('locations.update', $model->id) }}">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    @csrf
                    <label for="price">User ID:</label>
                    <select name="user_id" id="">
                        <? // TODO Visibility of current user
                        ?>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->getFullNameAttribute()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$model->name}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Address:</label>
                    <input type="text" class="form-control" name="address" value="{{$model->address}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Latitude:</label>
                    <input type="text" class="form-control" name="latitude" value="{{$model->latitude}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Longitude:</label>
                    <input type="text" class="form-control" name="longitude" value="{{$model->longitude}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Type:</label>
                    <input type="text" class="form-control" name="type" value="{{$model->type}}" required/>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
