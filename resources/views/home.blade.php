@extends('layouts.app')
<style>

</style>
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="containers">
    <div class="side-bar">
      <label for="board_name">Board Name:</label>
      <input type="text" class="form-control" name="board_name" id="board_name" value=""/>
      <div class="">
       <button type="submit" class="btn btn-primary" id="add_board">Add board</button>
      </div>
    </div>

    <div class="boards">
    @foreach ($boards as $board)
      <a class="card"  href="{{ $board->url }}">
        <div >
          <div class="card-body">
            {{$board->name}}
          </div>
        </div>
      </a>
    @endforeach  
    </div>
  </div>
  
  <script src="{{ asset('js/todo.js') }}" defer></script>

@endsection