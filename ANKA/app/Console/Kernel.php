<?php

namespace App\Console;

use App\Models\Participant;
use App\Models\Product;
use App\Models\Booking;
use App\Models\Timetable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        //Registering
        $schedule->call(function () {

                $users=[];
                if(($open=fopen(storage_path()."/registration.csv","r+"))!=FALSE){
                    while(($data=fgetcsv($open))!=FALSE){
                        $users[]=$data;
                    }
                    
    
                    for($i=1;$i<count($users);$i++){
                        if ($users[$i][4]=='0'){
                            
                        
                            //insert in the database
                        
                            $participant=new Participant();

                            $participant->name=$users[$i][0];
                            $participant->password=$users[$i][1];
                            
                            
                            $participant->DOB=date('Y-m-d',strtotime($users[$i][3]));
                            $participant->save();

                            $product=new Product();
                            $product->name=$users[$i][2];

                            $participantlink=Participant::where('name',$users[$i][0] )->get();
                            

                            $product->participants_id=$participantlink[0]['id'];
                            
                            
                            $product->save();
                            
                            $users[$i][4]='1';
                       
    
                        }
                    
    
                    }
                    
                
    
                    fseek($open,0);
                    
                    

                    foreach ($users as $row) {
                    fputcsv($open,$row);
                    }
                
                    
                    fclose($open);
    
    
                }
    
    
    
           
            })->everyMinute();

        // Posting products    
        $schedule->call(function () {

                $users=[];
                if(($open=fopen(storage_path()."/product.csv","r+"))!=FALSE){
                    while(($data=fgetcsv($open))!=FALSE){
                        $users[]=$data;
                    }
    
                    for($i=1;$i<count($users);$i++){
                        if ($users[$i][4]=='0'){
                            
                        
                            //update table
                        
                            $product=Product::where('name',$users[$i][0])->get();
                            $initial_quantity=(int)$product[0]['total_quantity'];
                            

                            Product::where('name',$users[$i][0])
                                ->update(['description'=>$users[$i][3],
                                        'price'=>(int)$users[$i][2],
                                        'total_quantity'=>(int)$users[$i][1]+$initial_quantity,
                                        'left_quantity'=>(int)$users[$i][1]+$initial_quantity
                                    ]);

                            
                            
                            
                            $users[$i][4]='1';
                       
    
                        }
                    
    
                    }
                
                
    
                    fseek($open,0);
                    foreach ($users as $row) {
                    fputcsv($open,$row);
                    }
                
                
                    fclose($open);
    
    
                }
    
    
    
           
            })->everyMinute();

            //quantity left
        $schedule->call(function (){
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

    
    
        })->everyMinute();
        

        //performance
        $schedule->call(function () {
            $users=[];
            if(($open=fopen(storage_path()."/performance.csv","r+"))!=FALSE){
                while(($data=fgetcsv($open))!=FALSE){
                    $users[]=$data;
                }
                

                for($i=1;$i<count($users);$i++){
                    if ($users[$i][1]=='0'){
                        
                    
                        // Write in report file


                        
                        if(($open1=fopen(storage_path()."/results.csv","w"))!=FALSE){
                
                        $participant=Participant::where('name',$users[$i][0])->get();

                        
                    
                        fputcsv($open1,['participant name','points','rank','return buyers','products left']);
                    
                    foreach ($participant as $pat) {
                        $products=Product::where('participants_id',$pat->id)->get();
                        
                        
                        fputcsv($open1,[$pat->name,$pat->points,$pat->rank,$products[0]->return_buyer,$products[0]->left_quantity]);
                        }
                    
                
                    
                    fclose($open1);
    
    
                        }
                    
                        
                        


                        
                        $users[$i][1]='1';
                    

                    }
                

                }
                
            

                        fseek($open,0);
                
                
                
                
                    foreach ($users as $row) {
                    fputcsv($open,$row);
                    }
                
            
                
                        fclose($open);


            }

        
        })->everyMinute();

        //Time table
        $schedule->call(function () {

            $users=[];
            if(($open=fopen(storage_path()."/time.csv","r+"))!=FALSE){
                while(($data=fgetcsv($open))!=FALSE){
                    $users[]=$data;
                }
                

                for($i=1;$i<count($users);$i++){
                    if ($users[$i][4]=='0'){
                        
                    
                        //insert in the database
                    
                        $timetable=new Timetable();

                        $timetable->participant_name=$users[$i][0];
                        $timetable->requesttime=date('H:m:s',strtotime($users[$i][1]));
                        $timetable->responsetime=date('H:m:s',strtotime($users[$i][3]));
                        $timetable->seentime=date('H:m:s',strtotime($users[$i][2]));
                        $timetable->save();

                        $users[$i][4]='1';

                    }
                

                }
                
            

                fseek($open,0);
                
                

                foreach ($users as $row) {
                fputcsv($open,$row);
                }
            
                
                fclose($open);


            }



       
        })->everyMinute();

        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
