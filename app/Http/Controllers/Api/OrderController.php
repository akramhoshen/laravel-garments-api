<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Style;
use App\Models\Buyer;
use App\Models\Size;
use App\Models\Statu;

use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    
    public function index()
    {        
        // $orders=DB::table("orders as o")  
        // ->join("customers as c","c.id","=","o.customer_id")
        // ->select("o.id","c.name as customer","c.mobile","o.order_date as date","o.shipping_address","o.order_total")
        // ->paginate(10);
        // return view("pages.order.index",["orders"=>$orders]);
        return response()->json(Order::get());
    }

    
    public function create(){

        $styles = Style::get();
        $buyers = Buyer::get();
        $sizes = Size::get();
        $status = Statu::get();

       // print_r($customers);
        return view("pages.order.create",["styles"=>$styles,"buyers"=>$buyers,"sizes"=>$sizes,"status"=>$status]);
    }


    public function store(Request $request){
         
        //Order
         $order=new Order;
         
        // print_r($order);

           $order->style_id = $request->style_id;
           $order->buyer_id = $request->buyer_id;
           $order->order_date = $request->order_date;
           $order->delivery_date = $request->delivery_date;
           $order->shipping_address = isset($request->shipping_address)?$request->shipping_address:"NA";
           $order->status_id = $request->status_id;
           $order->order_total = $request->order_total;
           $order->paid_amount = $request->paid_amount;
           $order->remark = isset($request->remark)?$request->remark:"NA";
           $order->discount = isset($request->discount)?$request->discount:0;
           $order->vat = isset($request->vat)?$request->vat:"0";
           
           $order->save();
         
        //  //Order Details
        $sizes = $request->sizes; 
        
        foreach($sizes as $size){         
           
            $order_detail=new OrderDetail;         

            $order_detail->order_id = $order->id;
            $order_detail->size_id = $size["size_id"];
            $order_detail->qty = $size["qty"];
            $order_detail->price = $size["price"];            
            $order_detail->discount = isset($size["discount"])?$size["discount"]:0;
            $order_detail->vat = 0;

            $order_detail->save();
      }

        return response()->json('Successfully Created');
        
         //Stock




    }

    
    public function show(string $id)
    {
        // return json_encode(Order::find($id));
        // $customer=DB::Table("customers")->where("id",$order->customer_id)->first();

        // $products=DB::Table("order_details as od")
        // ->join("products as p","p.id","=","od.product_id")
        // ->select("p.name","od.price","od.qty","od.discount")
        // ->where("od.order_id",$order->id)
        // ->get();

        // //print_r($customer->name);

        // return view("pages.order.show",["order"=>$order,"customer"=>$customer,"products"=>$products]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Order $order)
    {  
        $order->delete();
        


        //
    }
}
