@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Orders","button"=>"Create Order","route"=>url("orders/create")]) !!}

{!! Page::content_body() !!}

<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Buyer</th>
      <th>Style</th>
      <th>Order & Delivery Date</th>
      <th>Total Amount</th>
      <th>Status</th>
      <th>TNA</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach($orders as $order)
    <tr>
      <td>{{$order->id}}</td>
      <td>{{$order->buyer}}</td>
      <td>{{$order->style}}</td>
      <td>{{$order->date}} <br> {{$order->ddate}}</td>
      <td>{{$order->order_total}}</td>
      <td>{{$order->status}}</td>
      <td>
        <a class="btn btn-info" href="order-tnas/{{$order->id}}"><i style="font-size:17px" class="bi bi-clock"></i> TNA</a>
      </td>
      <td>
        <div class="btn-group" role="group">
          <a style="background:#0fb9b1; color:#fff;" class="btn" href="orders/{{$order->id}}"><i class="fa-solid fa-eye"></i></a>
          <a style="background:#3867d6; color:#fff;" class="btn" href="orders/{{$order->id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
          <form action="orders/{{$order->id}}" method="post">
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

{{$orders->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection