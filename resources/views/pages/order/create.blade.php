@extends('layouts.app')

@section('page')

{!! Page::content_open(["title"=>"Create Order","button"=>"Manage Order","route"=>url("orders")]) !!}
    <form action="#" method="POST">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-2">
                        <label>Style</label>
                        <div class="">
                            <select name="cmbStyleId" id="cmbStyleId" class="form-control">
                                @foreach($styles as $style)
                                <option value="{{$style->id}}">{{$style->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label>Buyer</label>
                        <div class="">
                            <select name="cmbBuyerId" id="cmbBuyerId" class="form-control">
                                @foreach($buyers as $buyer)
                                <option value="{{$buyer->id}}">{{$buyer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label>Shipping Address</label>
                    <textarea name="txtShippingAddress" id="txtShippingAddress" class="form-control"></textarea>
                </div>
                <div class="col-sm-6">
                    <div class="mb-2">
                        <label for="txtOrderDate" class="">Order Date</label>
                        <div class=""><input type="text" class="form-control" name="txtOrderDate" id="txtOrderDate" value="{!! date("d-m-Y") !!}" placeholder="" /></div>
                    </div>
                    <div class="mb-2">
                        <label for="txtDeliveryDate" class="">Delivery Date</label>
                        <div class=""><input type="text" class="form-control" name="txtDeliveryDate" id="txtDeliveryDate" value="{!! date("d-m-Y") !!}" placeholder="" /></div>
                    </div>
                    <div class="mb-2">
                        <label>Status</label>
                        <div class="">
                            <select name="cmbStatusId" id="cmbStatusId" class="form-control">
                                @foreach($status as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr />
                    <h6 class="color-primary">Add Item Details</h6>
                </div>
                <div class="col mx-auto">
                    <div class="mb-2">
                        <label>Size</label>
                        <div class="">
                            <select name="cmbSizeId" id="cmbSizeId" class="form-control">
                                @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col mx-auto">
                    <div class="mb-2">
                        <label for="txtQuantity" class="">Quantity</label>
                        <div class=""><input type="text" class="form-control" name="txtQuantity" id="txtQuantity" value="0"/></div>
                    </div>
                </div>
                <div class="col mx-auto">
                    <div class="mb-2">
                        <label for="txtPrice" class="">Price</label>
                        <div class=""><input type="text" class="form-control" name="txtPrice" id="txtPrice" value="0"/></div>
                    </div>
                </div>
                <div class="col mx-auto">
                    <div class="mb-2">
                        <label for="txtDiscount" class="">Discount</label>
                        <div class=""><input type="text" class="form-control" name="txtDiscount" id="txtDiscount" value="0"/></div>
                    </div>
                </div>
                <!-- <div class="col mx-auto">
                    <div class="mb-2">
                        <label for="vat" class="">Vat</label>
                        <div class=""><input type="text" class="form-control" name="vat" id="vat" value="0"/></div>
                    </div>
                </div> -->
                <div class="col-12">
                    <div class="btn-group" role="group">
                        <button type="button" id="btnAddToCart" name="btnAddToCart" style="color: #0fb9b1;" class="btn border"><i class="fa-solid fa-plus"></i></button>
                        <button type="button" id="clearAll" style="color: #eb3b5a;" class="btn border"><i class="fa-solid fa-trash"></i></button>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#SN</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="items">
                            
                        </tbody>
                    </table>
                    <hr />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 order-lg-1 order-2">
                    <div class="mb-2">
                        <label for="txtRemark" class="">Remarks</label>
                        <div class=""><input type="text" class="form-control" name="txtRemark" id="txtRemark" value="" placeholder="" /></div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 ms-auto">
                    <table class="table table-light text-end">
                        <tfoot>
                            <tr>
                                <th>Subtotal</th>
                                <th><input type="text" class="form-control form-control-sm text-right" name="txtSubtotal" id="txtSubtotal" value="0" /></th>
                            </tr>
                            <tr class="d-none">
                                <th></th>
                                <th><input type="text" class="form-control form-control-sm text-right" name="discount" id="discount" value="0" /></th>
                            </tr>
                            <tr>
                                <th>VAT</th>
                                <th><input type="text" class="form-control form-control-sm text-right" name="txtVat" id="txtVat" value="0" /></th>
                            </tr>
                            <tr>
                                <th>Paid Amount</th>
                                <th><input type="text" class="form-control form-control-sm text-right" name="txtPaidAmount" id="txtPaidAmount" value="0" /></th>
                            </tr>
                            <tr>
                                <th>Due Amount</th>
                                <th><input type="text" class="form-control form-control-sm text-right text-danger" name="txtDueAmount" id="txtDueAmount" value="0" /></th>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th><input type="text" class="form-control form-control-sm text-right h6" name="txtTotalAmount" id="txtTotalAmount" value="0" /></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer border-top">
            <input type="button" value="Create" name="btnProcessOrder" id="btnProcessOrder" class="btn btn-info" />
        </div>
    </form>
{!! Page::content_close() !!}

<script>
$(function() {
    // Show calendar in textbox
    $("#txtOrderDate").datepicker({ dateFormat: 'dd-mm-yy' });
    $("#txtDeliveryDate").datepicker({ dateFormat: 'dd-mm-yy' });

    printCart();

    // Save into database table
    $("#btnProcessOrder").on("click", function(e) {
        e.preventDefault();
        var token = $("input[name='_token']").val();
        var method = $("input[name='_method']").val();
        let style_id = $("#cmbStyleId").val();
        let buyer_id = $("#cmbBuyerId").val();
        let order_date = $("#txtOrderDate").val();
        let delivery_date = $("#txtDeliveryDate").val();
        let shipping_address = $("#txtShippingAddress").val();
        let status_id = $("#cmbStatusId").val();
        let paid_amount = $("#txtPaidAmount").val();
        let total = $("#txtTotalAmount").val();
        let remark = $("#txtRemark").val();
        let discount = $("#txtDiscount").val();
        let vat = $("#txtVat").val();
        let sizes = JSON.parse(localStorage.getItem("cart"));

        $.ajax({
            url: "{{route('orders.store')}}",
            type: 'POST',
            data: {
                _token: token,
                _method: method,
                "cmbStyle": style_id,
                "cmbBuyer": buyer_id,
                "txtOrderDate": order_date,
                "txtDeliveryDate": delivery_date,
                "txtShippingAddress": shipping_address,
                "cmbStatus": status_id,
                "order_total": total,
                "paid_amount": paid_amount,
                "remark": remark,
                "txtDiscount": discount,
                "txtVat": vat,
                "txtSizes": sizes
            },
            success: function(res) {
                console.log(res);
                clearCart();
                $("#items").html("");
            }
        });
    });

    // Show customer other information
    $("#cmbSizeId").on("change", function() {
        let id = $(this).val();
        $.ajax({
            url: "{{url('api/sizes')}}/" + `${id}`,
            type: 'GET',
            success: function(res) {
                let size = JSON.parse(res);
                console.log(size);
                $("#txtQuantity").focus();
                $("#txtQuantity").val(1);
            }
        });
    });

    // Add item to bill temporarily
    $("#btnAddToCart").on("click", function() {
        addToCart();
    });

    $("body").on("click", ".delete", function() {
        let id = $(this).data("id");
        delItem(id);
        printCart();
    });

    $("#clearAll").on("click", function() {
        clearCart();
        printCart();
    });

    //------------------Cart Functions----------//

    function addToCart() {
        let item_id = $("#cmbSizeId").val();
        let name = $("#cmbSizeId option:selected").text();
        let price = $("#txtPrice").val();
        let qty = $("#txtQuantity").val();
        let discount = $("#txtDiscount").val();
        let total_discount = discount * qty;
        let subtotal = price * qty - total_discount;

        let item = {
            "name": name,
            "item_id": item_id,
            "price": price,
            "qty": parseFloat(qty),
            "discount": discount,
            'total_discount': total_discount,
            "subtotal": subtotal
        };

        console.log(item);

        save(item);
        printCart();
    }

    function printCart() {
        let cart = getCart();
        let sn = 1;
        let $bill = "";
        let subtotal = 0;
        $.each(cart, function(i, item) {
            subtotal += item.price * item.qty - item.discount;
            let $html = "<tr>";
            $html += "<td>";
            $html += sn;
            $html += "</td>";
            $html += "<td>";
            $html += item.name;
            $html += "</td>";
            $html += "<td data-field='price'>";
            $html += item.price;
            $html += "</td>";
            $html += "<td data-field='qty'>";
            $html += item.qty;
            $html += "</td>";
            $html += "<td data-field='discount'>";
            $html += item.discount;
            $html += "</td>";
            $html += "<td data-field='subtotal'>";
            $html += subtotal;
            $html += "</td>";
            $html += "<td>";
            $html += "<button type='button' class='delete btn btn-sm btn-outline-danger' data-id='" + item.item_id + "'><i class='fa-solid fa-trash'></i></button>";
            $html += "</td>";
            $html += "</tr>";
            $bill += $html;
            sn++;
        });

        $("#items").html($bill);

        // Order Summary
        $("#txtSubtotal").val(subtotal);
        let tax = (subtotal * 0.05);
        $("#txtVat").val(tax);
        $("#txtTotalAmount").val(parseFloat(subtotal) + parseFloat(tax));
        $("#txtDueAmount").val(parseFloat(subtotal) + parseFloat(tax));

        // Update total and due amounts based on paid amount
        $("#txtPaidAmount").on("keyup", function(e) {
            let paidAmount = parseFloat($(this).val());
            let totalAmount = parseFloat($("#txtTotalAmount").val());
            let dueAmount = totalAmount - paidAmount;
            $("#txtDueAmount").val(dueAmount);
        });
    }
});
</script>
@endsection