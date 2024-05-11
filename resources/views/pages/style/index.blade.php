@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Style","button"=>"Create Style","route"=>url("styles/create")]) !!}

{!! Page::content_body() !!}

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Code</th>
      <th>Category</th>
      <th>Description</th>
      <th>Tech Pack</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($styles as $style)
    <tr>
      <td>{{$style->id}}</td>
      <td>{{$style->code}}</td>
      <td>{{$style->category}}</td>
      <td>{{$style->description}}</td>
      <td>
        <a style="background:#20bf6b; color:#fff;" class="btn" href="techpacks/{{$style->id}}"><i style="font-size:17px" class="bi bi-file-earmark-check-fill"></i> Tech Pack</a>
      </td>
      <td>
        <div class="btn-group" role="group">
          <a style="background:#0fb9b1; color:#fff;" class="btn" href="styles/{{$style->id}}"><i class="fa-solid fa-eye"></i></a>
          <a style="background:#3867d6; color:#fff;" class="btn" href="styles/{{$style->id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
          <form action="styles/{{$style->id}}" method="post">
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

{{$styles->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection