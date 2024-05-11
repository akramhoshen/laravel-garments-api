@extends('layouts.app')

@section('page')

{!! Page::header(["title"=>"Manage Product"]) !!}
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Product","button"=>"Create Product","route"=>url("products/create")]) !!}

{!! Page::content_body() !!}
{!! Table::get_array_table($products,["id","name","description","image","price","category"],"products") !!} 
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#SL</th>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Image</th>
      <th>Price</th>
      <th>Product_Category_Id</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($products as $product)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{$product->id}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>
        <img src="assets/img/{{$product->image}}" alt="" width="80">
      </td>
      <td>{{$product->price}}</td>
      <td>{{$product->category}}</td>
      <td>
        <div class="btn-group" role="group">
          <a class="btn btn-success" href="products/{{$product->id}}"><i class="fa-solid fa-eye"></i></a>
          <a class="btn btn-info text-white" href="products/{{$product->id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
          <!-- <a class="btn btn-danger" href="products/{{$product->id}}"><i class="fa-solid fa-trash"></i></a> -->
          <form action="products/{{$product->id}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger rounded-start-0" onclick="return confirm('Are you sure you want to delete this product?')"><i class="fa-solid fa-trash"></i></button>
          </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$products->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection