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
      <p class="title mb-15">Todo List</p>
      <div class="todo">
        <form action="/todos/create" method="post" class="flex between mb-30">
          @csrf
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <input type="text" class="input-add" name="content">
          <input class="button-add" type="submit" value="追加">
        </form>
        <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
            @foreach ($todos as $todo)
            <tr>
                <td><input type="hidden" name="id" value="{{$todo->id}}"></td>
                <td>{{$todo->created_at}}</td>
                <form action="/todos/update" method="post">
                @csrf
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">              
                <td>
                  <input type="text" class="input-update" value="{{$todo->content}}" name="content">
                </td>
                <td>
                  <button class="button-update">更新</button>
                </td>
                </form>
                <td>
                  <form action="/todos/delete" method="post">
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