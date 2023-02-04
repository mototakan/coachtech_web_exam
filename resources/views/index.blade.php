<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css" >
  <link rel="stylesheet" href="/css/style.css" >
  <title>Todolist</title>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card__header">
        <p class="title mb-15">Todo List</p>
          <div class="auth mb-15">
            <p class="detail">
              @if (Auth::check())
              <p class="detail">「{{$user->name}}」でログイン中</p>
              @else
              <p>ログインしてください。（<a href="/login">ログイン</a>|<a href="/register">登録</a>）</p>
              @endif
            </p>
            <form method="post" action="/logout">
              @csrf
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <input class="btn btn-logout" type="submit" value="ログアウト">
            </form>
          </div>
      </div>
      <a class="btn btn-search" href="/todo/find">タスク検索</a>
      <div class="todo">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
        <form action="/todo/create" method="post" class="flex between mb-30">
          @csrf
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="text" class="input-add" name="content">
          <select name="tag_id" class="select-tag">
            <option value="1">家事</option>
            <option value="2">勉強</option>
            <option value="3">運動</option>
            <option value="4">食事</option>
            <option value="5">移動</option>
          </select>
          <input class="button-add" type="submit" value="追加">
        </form>
        <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>タグ</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
            @foreach ($todos as $todo)
            <tr>
                <td>{{$todo->created_at}}</td>
                <form action="/todos/update{{$todo->id}}" method="post">
                @csrf
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              
                <td>
                  <input type="text" class="input-update" value="{{$todo->content}}" name="content">
                </td>
                <td>
                  <select name="tag_id" class="select-tag">
                        <option {{$todo->isSelectedTag('1')}} value="1">家事</option>
                        <option {{$todo->isSelectedTag('2')}} value="2">勉強</option>
                        <option {{$todo->isSelectedTag('3')}} value="3">運動</option>
                        <option {{$todo->isSelectedTag('4')}} value="4">食事</option>
                        <option {{$todo->isSelectedTag('5')}} value="5">移動</option>
                  </select>
                </td>
                <td>
                  <button class="button-update">更新</button>
                </td>
                </form>
                <td>
                  <form action="/todos/delete{{$todo->id}}" method="post">
                  @csrf
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                    <button class="button-delete">削除</button>
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