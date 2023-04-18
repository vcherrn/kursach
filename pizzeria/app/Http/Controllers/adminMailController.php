<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class adminMailController extends Controller
{
    public $mailData;
    public function send(Request $request){
      
       $orderinfo = '';
       $pizzas='';
      
        $count = 0;
        $countloop=0;
        $index=0;

        foreach ($request->all() as $temp) {
   
            foreach ($temp as $t) {
                    $count +=1;

            }

        }

      foreach ($request->all() as $temp) {
       
         
        $j=0;
         foreach ($temp as $t) {
           
            if($countloop <= $count){
                
                if($j==0){
                    $pizzas .=   $t . " ";
                }
                else if ($j == 1){
                    $pizzas .=  $t . " ";
                }
                else if ($j == 2){
                    $pizzas .= " x " .  $t . "; ";
                }
                else{
                    if($index!=1){
                        if($j==8){
                            $orderinfo .= " " . "Сумма заказа: " . $t . ";           ";
                        }
                        else if ($j == 3){
                            $orderinfo .= " Особые пожелания: " .  $t . "; ";
                        }
                        else if ($j == 4){
                            $orderinfo .= " Имя: " .  $t . "; ";
                        }
                        else if ($j == 5){
                            $orderinfo .= " Почта: " .  $t . "; ";
                        }
                        else if ($j == 6){
                            $orderinfo .= " Телефон: " .  $t . "; ";
                        }
                        else if ($j == 7){
                            $orderinfo .= " Адрес: " .  $t . "; ";
                        }
                        
                       
                    }
                }
                $j+=1;

               
            }
            
         
           
        }
        $countloop+=1;
        $index=1;

    }

            $mailData = [
                "name" => $pizzas,
                "dob" => $orderinfo,
            ];
   
       

                Mail::to("admin@gmail.com")->send(new AdminMail($mailData));

            
                //dd("Mail Sent Successfully!");

      
    }
}
