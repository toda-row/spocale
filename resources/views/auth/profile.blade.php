
@extends('layouts.app')
@section('content')
<div class="panel-body">
        @include('common.errors')
        <form action="{{ url('events/profile/update')}}" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal" >
        <!-- item_name -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="user_name">ニックネーム</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="col-sm-6">
                    <label for="email">メールアドレス</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="col-sm-6">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{$user->password}}">
                </div>

                
                
            </div>

            <!-- Save ボタン/ Back ボタン -->
            <div class="well well-sm">
            <button type="submit" class="btn btn-primary"> Save</button>
            
            <a class="btn btn-link pull-right" href="{{ url('/events') }}">
            <i class="glyphicon glyphicon-backward"></i> Back </a>
            </div>
            <!-- Save ボタン/ Back ボタン -->
            <!-- id 値 を 送信 -->
            <input type="hidden" name="id" value="{{$user->id}}" />
            <!--/ id 値 を 送信 -->
            <!-- CSRF -->
                {{csrf_field()}}
            <!--/ CSRF -->
            </div>
        </form>
</div>
        @endsection