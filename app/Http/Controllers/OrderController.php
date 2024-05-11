<?php

namespace App\Http\Controllers;

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
        $orders=DB::table("orders as o")  
        ->join("buyers as b","b.id","=","o.buyer_id")
        ->join("styles as s","s.id","=","o.style_id")
        ->join("status as st","st.id","=","o.status_id")
        ->select("o.id","b.name as buyer","s.code as style","st.name as status","o.order_date as date","o.delivery_date as ddate","o.shipping_address","o.order_total","o.paid_amount","o.remark","o.discount","o.vat")
        ->paginate(5);
        return view("pages.order.index",["orders"=>$orders]);
    }

    
    public function create(){

        $styles = Style::get();
        $buyers = Buyer::get();
        $sizes = Size::get();
        $status = Statu::get();

       // print_r($customers);
        return view("pages.order.create",["styles"=>$styles,"buyers"=>$buyers,"sizes"=>$sizes,"status"=>$status]);
    }

    
    // public function store(Request $request){
         
    //     //Order
    //      $order=new Order;
         
    //     // print_r($order);

    //        $order->style_id = $request->cmbStyle;
    //        $order->buyer_id = $request->cmbBuyer;
    //        $order->order_date = date("Y-m-d",strtotime($request->txtOrderDate));
    //        $order->delivery_date = date("Y-m-d",strtotime($request->txtDeliveryDate));
    //        $order->shipping_address = isset($request->txtShippingAddress)?$request->txtShippingAddress:"NA";
    //        $order->status_id = $request->cmbStatus;
    //        $order->order_total = $request->order_total;
    //        $order->paid_amount = $request->paid_amount;
    //        $order->remark = isset($request->remark)?$request->remark:"NA";
    //        $order->discount = isset($request->txtDiscount)?$request->txtDiscount:0;
    //        $order->vat = isset($request->txtVat)?$request->txtVat:"0";
           
    //        $order->save();
         
    //     //  //Order Details
    //     $sizes = $request->txtSizes; 
        
    //     foreach($sizes as $size){         
           
    //         $order_detail=new OrderDetail;         

    //         $order_detail->order_id = $order->id;
    //         $order_detail->size_id = $size["item_id"];
    //         $order_detail->qty = $size["qty"];
    //         $order_detail->price = $size["price"];            
    //         $order_detail->discount = isset($size["discount"])?$size["discount"]:0;
    //         $order_detail->vat = 0;

    //         $order_detail->save();
    //   }


    //      //Stock




    // }

    public function store(Request $request){
         
        //Order
         $order=new Order;
         
        // print_r($order);

           $order->style_id = $request->cmbStyle;
           $order->buyer_id = $request->cmbBuyer;
           $order->order_date = date("Y-m-d",strtotime($request->txtOrderDate));
           $order->delivery_date = date("Y-m-d",strtotime($request->txtDeliveryDate));
           $order->shipping_address = isset($request->txtShippingAddress)?$request->txtShippingAddress:"NA";
           $order->status_id = $request->cmbStatus;
           $order->order_total = $request->order_total;
           $order->paid_amount = $request->paid_amount;
           $order->remark = isset($request->remark)?$request->remark:"NA";
           $order->discount = isset($request->txtDiscount)?$request->txtDiscount:0;
           $order->vat = isset($request->txtVat)?$request->txtVat:"0";
           
           $order->save();
         
        //  //Order Details
        $sizes = $request->txtSizes; 
        
        foreach($sizes as $size){         
           
            $order_detail=new OrderDetail;         

            $order_detail->order_id = $order->id;
            $order_detail->size_id = $size["item_id"];
            $order_detail->qty = $size["qty"];
            $order_detail->price = $size["price"];            
            $order_detail->discount = isset($size["discount"])?$size["discount"]:0;
            $order_detail->vat = 0;

            $order_detail->save();
      }


         //Stock




    }

    
    public function show(Order $order)
    {

        $buyer=DB::Table("buyers")->where("id",$order->buyer_id)->first();
        $style=DB::Table("styles")->where("id",$order->style_id)->first();
        $status=DB::Table("status")->where("id",$order->status_id)->first();

        $details=DB::Table("order_details as od")
        ->join("sizes as s","s.id","=","od.size_id")
        ->select("s.name","od.price","od.qty","od.discount")
        ->where("od.order_id",$order->id)
        ->get();

        //print_r($customer->name);

        return view("pages.order.show",["order"=>$order,"buyer"=>$buyer,"details"=>$details,"style"=>$style,"status"=>$status]);
    }

    
    public function edit(string $id)
    {
        $order = Order::where('id',$id)->first();
        $style = Style::all();
        $buyer = Buyer::all();
        $status = Statu::all();
        return view("pages.style.edit",['order'=>$order,'style'=>$style,'buyer'=>$buyer,'status'=>$status]);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    // public function destroy(Order $order)
    // {  
    //     $order->delete();
        


    //     //
    // }
    
    public function destroy(string $id)
    {
        $order = Order::where('id',$id)->first();
        $order->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
