@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Style Trim","button"=>"Create Style Trim","route"=>url("sttrims/create")]) !!}

{!! Page::content_body() !!}

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Style_id</th>
      <th>Trim_id</th>
      <th>Description</th>
      <th>Photo</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($rm as $r)
    <tr>
      <td>{{$r->id}}</td>
      <td>{{$r->style_id}}</td>
      <td>{{$r->trim_id}}</td>
      <td>{{$r->description}}</td>
      <td>
        <img class='shadow rounded' src="img/{{$r->photo}}" alt="" width="80" style='border: 2px solid #dee2e6; padding: 3px;'>
      </td>
      <td>
        <div class="btn-group" role="group">
          <a style="background:#0fb9b1; color:#fff;" class="btn" href="sttrims/{{$r->id}}"><i class="fa-solid fa-eye"></i></a>
          <a style="background:#3867d6; color:#fff;" class="btn" href="sttrims/{{$r->id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
          <form action="sttrims/{{$r->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" style="background:#eb3b5a; color:#fff;" class="btn rounded-start-0" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa-solid fa-trash"></i></button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$rm->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection