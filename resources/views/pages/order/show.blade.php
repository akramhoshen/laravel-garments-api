@extends('layouts.app')

@section('page')
<style>
.px-3.py-1.bg-light {
    background: #c6d9ff!important;
}
.card.rounded-0.shadow-none.border.h-100 {
    border-radius: 0!important;
    box-shadow: none!important;
}
.card.bg-transparent.rounded-0.shadow-none{
    border-radius: 0!important;
    box-shadow: none!important;
}
.header-text p,p{
    font-size: 14px;
    margin-bottom: 3px!important;
}
.header-text h6{
    font-weight: bolder;
}
.px-3.py-1.bg-light h5{
    font-weight: bold;
}
tfoot th,td{
  font-size: 14px;
}
/* @media print {
    #printableArea {
        padding: 10px!important;
        background-color: #fff!important;
    }
} */
</style>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div style="margin-top: 30px;" class="card">
                <div class="card-header" style="background-color: #c6d9ff;">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <h4 class="m-0" style="font-size: 21px; color: #012970; font-weight: 600;">Order Details</h4>
                        <a href="{{url('orders')}}" class="btn btn-success my-primary-btn">Manage Order</a>
                    </div>
                </div>
                <div class="card-body" id="printableArea">
                    <h3 class="color-primary text-uppercase fw-semibold text-center mb-0 mt-2">InstaFit</h3>
                    <h4 class="text-center text-uppercase color-default"><strong>Buyer's Order #{{$order->id}}</strong></h4>
                    <div class="row header-text">
                        <div class="col-sm-6">
                            <h6 class="color-primary m-0">Buyer:</h6>
                            <h6 class="color-text m-0">{{$buyer->name}}</h6>
                            <p class="color-text mb-0">
                                {{$buyer->address}} <br />
                                {{$buyer->mobile}} <br />
                                {{$buyer->email}}
                            </p>
                        </div>
                        <div class="col-sm-6 text-end">
                          <div class="right-content">
                            <p class="color-text m-0"><strong>Order date:</strong> {{ date('Y-m-d', strtotime($order->order_date)) }}</p>
                            <p class="color-text m-0"><strong>Delivery date:</strong> {{ date('Y-m-d', strtotime($order->delivery_date)) }}</p>
                            <p class="color-text m-0"><strong>Status:</strong> {{$status->name}}</p>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <hr />
                            <table class="table table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Size</th>
                                        <th class="text-right">Price</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Discount</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1 @endphp
                                    @foreach($details as $detail)
                                    <tr class="border-top">
                                        <th>{{ $count++ }}</th>
                                        <td>{{$detail->name}}</td>
                                        <td class="text-right">{{$detail->price}}</td>
                                        <td class="text-right">{{$detail->qty}}</td>
                                        <td class="text-right">{{$detail->discount}}</td>
                                        <td class="text-right">{{$detail->price * $detail->qty - $detail->discount}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                          <div class="mb-2">
                              <p class="color-text m-0"><strong>Remarks:</strong> {{$order->remark}}</p>
                          </div>
                      </div>
                      <div class="col-sm-4 ms-auto">
                          <table class="table table-light text-end">
                              <tfoot>
                                  <tr>
                                      <th>Paid Amount</th>
                                      <td>{{$order->paid_amount}}</td>
                                  </tr>
                                  <tr>
                                      <th>Due Amount</th>
                                      <td>{{$order->order_total-$order->paid_amount}}</td>
                                  </tr>
                                  <tr>
                                      <th>Total</th>
                                      <td>{{$order->order_total}}</td>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fas fa-print mr-2"></i> Print</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>
@endsection