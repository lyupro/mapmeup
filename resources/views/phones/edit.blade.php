@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add New Phone
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
            <form method="post" action="{{ route('phones.update', $model->id) }}">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    @csrf
                    <label for="price">User ID:</label>
                    <select name="user_id" id="">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->getFullNameAttribute()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Number:</label>
                    <input type="text" class="form-control" name="number" value="{{$model->number}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Primary:</label>
                    <input type="text" class="form-control" name="primary" value="{{$model->primary}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Model:</label>
                    <input type="text" class="form-control" name="model" value="{{$model->model}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Company:</label>
                    <input type="text" class="form-control" name="company" value="{{$model->company}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">OS:</label>
                    <input type="text" class="form-control" name="os" value="{{$model->os}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">OS Version:</label>
                    <input type="text" class="form-control" name="os_version" value="{{$model->os_version}}" required/>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
