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
        <form action="/todo-introduction/todo/create" method="post" class="flex between mb-30">
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
            <tr>
              <td>
                2023-01-18 05:29:10
              </td>
              <form action="http://54.65.181.123/todo/update?id=182" method="post">
                @csrf
              </form>
                <input type="hidden" name="_token" value="QZA1vAcKEAnaYy4GGQJMvleDh0w2wXzFOYFOnsqM">              
              <td>
                <input type="text" class="input-update" value="hello world" name="content">
              </td>
              <td>
                <button class="button-update">更新</button>
              </td>
              <td>
                <form action="http://54.65.181.123/todo-introduction/todo/delete?id=182" method="post">
                @csrf
                <input type="hidden" name="_token" value="QZA1vAcKEAnaYy4GGQJMvleDh0w2wXzFOYFOnsqM">                <button class="button-delete">削除</button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</body>