@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add New Group
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
            <form method="post" action="{{ route('groups.update', $model->id) }}">
                <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    @csrf
                    <label for="name">Group Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$model->name}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Description:</label>
                    <input type="text" class="form-control" name="description" value="{{$model->description}}" required/>
                </div>
                <div class="form-group">
                    <label for="price">Owner ID:</label>
                    <select name="owner_id" id="">
                        @foreach($users as $user)
                            @if($user->id != $model->owner_id)
                                <option value="{{$user->id}}">{{$user->getFullNameAttribute()}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
@endsection
