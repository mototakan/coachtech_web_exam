<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css" >
  <link rel="stylesheet" href="/css/style.css" >
  <title>Todosearch</title>
</head>
<body class="font-sans antialiased">
  <div class="container">
    <div class="card">
      <div class="card__header">
        <p class="title mb-15">タスク検索</p>
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
    <div class="todo">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
        <form action="/todo/search" method="get" class="flex between mb-30">
          @csrf
          <input type="text" name="keyword" value="{{ $keyword }}">
          <select name="tag_id" class="select-tag">
            <option value="1">家事</option>
            <option value="2">勉強</option>
            <option value="3">運動</option>
            <option value="4">食事</option>
            <option value="5">移動</option>
          </select>
          <input class="button-add" type="submit" name="search" value="検索">
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
                <td>
                  <input type="text" class="input-update" value="{{$todo->content}}" name="content">
                </td>
                <td>
                  <select name="tag_id" class="select-tag">
                        <option value="1">家事</option>
                        <option value="2">勉強</option>
                        <option value="3">運動</option>
                        <option value="4">食事</option>
                        <option value="5">移動</option>
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