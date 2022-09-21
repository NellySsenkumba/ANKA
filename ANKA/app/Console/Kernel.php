<?php

namespace App\Console;

use App\Models\Participant;
use App\Models\Product;
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
                                        'total_quantity'=>(int)$users[$i][1]+$initial_quantity
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

            //performance
            $schedule->call(function () {

                $users=[];
                if(($open=fopen(storage_path()."/performance.csv","r+"))!=FALSE){
                    while(($data=fgetcsv($open))!=FALSE){
                        $users[]=$data;
                    }
                    
    
                    // for($i=1;$i<count($users);$i++){
                        // if ($users[$i][4]=='0'){
                            
                        
                            //insert in the database
                        
                            
                            


                            
                            // $users[$i][4]='1';
                       
    
                        // }
                    
    
                    // }
                    
                
    
                    fseek($open,0);
                    
                    
                    $participant=Participant::all();
                    // foreach ($users as $row) {
                    // fputcsv($open,$row);
                    // }
                    fputcsv($open,['participant ID','participant name','points']);
                    foreach ($participant as $pat) {
                        fputcsv($open,[$pat->id,$pat->name,$pat->points]);
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
