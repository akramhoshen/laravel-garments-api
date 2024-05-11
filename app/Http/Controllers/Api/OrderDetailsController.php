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

class OrderDetailsController extends Controller
{
    
    public function index()
    {        
        return response()->json(OrderDetail::get());
    }


    public function store(Request $request){

    }

    
    public function show(OrderDetail $order)
    {

        // $customer=OrderDetail::where("id",$order->order_id)->get();

        // return json_encode(OrderDetail::where("id",$orderDetail->id));

        
        // $customer=DB::Table("order_details")->where("id",$order->order_id)->first();
        // return response()->json($customer);

        // $products=DB::Table("order_details as od")
        // ->join("products as p","p.id","=","od.product_id")
        // ->select("p.name","od.price","od.qty","od.discount")
        // ->where("od.order_id",$order->id)
        // ->get();

        //print_r($customer->name);
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
