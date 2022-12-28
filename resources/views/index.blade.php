@extends('layouts.default')
<style>
  html,
  body,
  div,
  span,
  object,
  iframe,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  p,
  blockquote,
  pre,
  abbr,
  address,
  cite,
  code,
  del,
  dfn,
  em,
  img,
  ins,
  kbd,
  q,
  samp,
  small,
  strong,
  sub,
  sup,
  var,
  b,
  i,
  dl,
  dt,
  dd,
  ol,
  ul,
  li,
  fieldset,
  form,
  label,
  legend,
  table,
  caption,
  tbody,
  tfoot,
  thead,
  tr,
  th,
  td,
  article,
  aside,
  canvas,
  details,
  figcaption,
  figure,
  footer,
  header,
  hgroup,
  menu,
  nav,
  section,
  summary,
  time,
  mark,
  audio,
  video {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
  }

  body {
    line-height: 1;
  }

  article,
  aside,
  details,
  figcaption,
  figure,
  footer,
  header,
  hgroup,
  menu,
  nav,
  section {
    display: block;
  }

  nav ul {
    list-style: none;
  }

  blockquote,
  q {
    quotes: none;
  }

  blockquote:before,
  blockquote:after,
  q:before,
  q:after {
    content: '';
    content: none;
  }

  a {
    margin: 0;
    padding: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
  }

  /* change colours to suit your needs */
  ins {
    background-color: #ff9;
    color: #000;
    text-decoration: none;
  }

  /* change colours to suit your needs */
  mark {
    background-color: #ff9;
    color: #000;
    font-style: italic;
    font-weight: bold;
  }

  del {
    text-decoration: line-through;
  }

  abbr[title],
  dfn[title] {
    border-bottom: 1px dotted;
    cursor: help;
  }

  table {
    border-collapse: collapse;
    border-spacing: 0;
  }

  /* change border colour to suit your needs */
  hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #cccccc;
    margin: 1em 0;
    padding: 0;
  }

  input,
  select {
    vertical-align: middle;
  }

  .container {
    position: relative;
    width: 100vw;
    height: 100vh;
    background: #2d197c;
  }

  .card {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 50vw;
    transform: translate(-50%, -50%);
    padding: 30px;
    background: white;
    border-radius: 10px;
  }

  .title {
    margin: 0 0 15px 0;
    font-weight: bold;
    font-size: 24px;
  }

  .add-form {
    margin-bottom: 30px;
    display: flex;
    justify-content: space-between;
  }

  .text {
    padding: 5px;
    font-size: 14px;
    border: 1px solid #CCCCCC;
    border-radius: 5px;
  }

  .add-text {
    width: 80%;
  }

  .button {
    padding: 8px 16px;
    background: white;
    font-size: 12px;
    font-weight: bold;
    border-radius: 5px;
    transition: 0.4s;
  }

  .add-button {
    color: #dc70fa;
    border: 2px solid #dc70fa;
  }

  .add-button:hover {
    background: #dc70fa;
    color: white;
  }

  table {
    text-align: center;
    width: 100%;
  }

  tr {
    height: 50px;
  }

  .update-text {
    width: 90%;
  }

  .update-button {
    color: #fa9770;
    border: 2px solid #fa9770;
  }

  .update-button:hover {
    background: #fa9770;
    color: white;
  }

  .delete-button {
    color: #71fadc;
    border: 2px solid #71fadc;
  }
  
  .delete-button:hover {
    background: #71fadc;
    color: white;
  }
</style>
@section('content')
<div class="container">
  <div class="card">
    <p class="title">Todo List</p>
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    @endif
    <div class="todo">
      <form action="/todos/create" method="post" class="add-form">
        @csrf
        <input type="text" class=" text add-text" name="task">
        <input type="submit" class="button add-button" value="追加">
      </form>
      <table>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>
        @foreach ($todos as $todo)
        <tr>
          <td>{{$todo->created_at}}</td>
          <form action="/todos/update?id={{$todo->id}}" method="post">
            @csrf
            <td><input type="text" class="text update-text" name="task" value="{{$todo->task}}"></td>
            <td><button class="button update-button">更新</button></td>
          </form>
          <td>
            <form action="/todos/delete?id={{$todo->id}}" method="post">
              @csrf
              <button class="button delete-button">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
  @endsection