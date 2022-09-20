<?php

namespace App\Console;

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
        $schedule->call(function () {

                $users=[];
                if(($open=fopen(storage_path()."/registration.csv","r+"))!=FALSE){
                    while(($data=fgetcsv($open))!=FALSE){
                        $users[]=$data;
                    }
    
                    for($i=1;$i<count($users);$i++){
                        if ($users[$i][4]=='0'){
                            
                        
                            //insert
                        
                            // $pizza=new (new Pizza);

                            // $pizza->name=$users[$i][0];
                            // $pizza->type=$users[$i][1];
                            // $pizza->base=$users[$i][2];
                            // $pizza->toppings=$users[$i][3];
                            
                            // $pizza->save();
                            
                            // $users[$i][4]='1';
                       
    
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
