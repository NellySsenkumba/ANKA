<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $products=Product::all();
        Session::put('product',[]);
        Session::put('quantity',[]);
        Session::put('customer',[]);
        return view('Customer.index',["products"=>$products]);
    }

    public function create(){
       
        //from sesion$session
        
        $product=Session::get('product');
        $customer=Session::get('customer');
        $quantity=Request('quantity');
        $points=[];
        
                    
               
        for($record=0;$record<count($product);$record++){
            $points[$record]=0;
            if($quantity[$record]!=0){
                $book=Booking::where('product_id',$product[$record])
                ->where('customer_id',$customer[$record])->get();
                if(count($book)==0){
                    // echo('no record');
                    // echo($book);
                    $points[$record]=1;
                }else{
                    // echo('return buyer');
                    if(count($book)==1){
                        $returnproduct=Product::where('id',$product[$record])->get();
                    $returnproduct[0]->return_buyer+=1;
                    $returnproduct[0]->update();
                    }
                    



                    if($quantity[$record]!=1){
                        $points[$record]=4;
                    }
                    else{
                        $points[$record]=2;
                    }
                    // echo($book);
                }
                
                
                
            $book=new Booking();
            $book->customer_id=(int)$customer[$record];
            $book->product_id=(int)$product[$record];
            $book->quantity=(int)$quantity[$record];
            $book->save();

            
          
            }

             
        }
        //save points
        for($record=0;$record<count($points);$record++){
        $item=Product::find(1,'participants_id')->where('id',(int)$product[$record])->get();
                $participant=Participant::find($item[0]->participants_id)->where('id',(int)$item[0]->participants_id)->get();
                $temp=$participant[0]->points;
                $participant[0]->points=$temp+ $points[$record];
                $participant[0]->update();
                
        }


        //rank
        $part=Participant::orderBy('points','desc')->get();

        
        for($i=0;$i<count($part);$i++){
            $part[$i]->rank=(int)$i+1;
            $part[$i]->update();
            
        }
        
        //quantity left
        $book=Booking::all();
        for($i=0;$i<count($book);$i++){
            $quantity=0;
            for($j=0;$j<count($book);$j++){
                if($book[$i]->product_id==$book[$j]->product_id){
                    $quantity=$quantity+$book[$j]->quantity;

                }
            }
            
            $prdt=Product::find(1)->where('id',$book[$i]->product_id)->get();
            $prdt[0]->left_quantity=$prdt[0]->total_quantity-$quantity;
            $prdt[0]->update();
            

        }
        

        
        return redirect('/Customer/products')->with('message','Thanks for your order');
    }
    

    public function participants(){
        $participants=Participant::all();
        $products=Product::all();
        return view('Customer.participants',['participants'=>$participants,'products'=>$products]);
    }




    
}
