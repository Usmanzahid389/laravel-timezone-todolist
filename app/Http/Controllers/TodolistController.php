<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Carbon\Carbon;
use App\Helpers\TimezoneHelper;
use Illuminate\Support\Facades\Storage;


class TodolistController extends Controller
{
     public function index(Request $request)
     {   
         

         //checking the request ip and its timezone
         $timezoneHelper = new TimezoneHelper;
         $timezone =$timezoneHelper->getTimeZone($request);
         
         //if data is comming from Database
         $tasks = Tasks::get();


         //For Local Storage

         // $tasks = Storage::disk('public')->get('/data.json');
         
         // $tasks = json_decode($tasks, true);
          
         

            foreach($tasks as $row)
            { 
               
                if(!empty($timezone))
                {  $date =  Carbon::createFromTimestamp($row->deadline,$timezone)->toDateTimeString(); }
                else { $date =  Carbon::createFromTimestamp($row->deadline)->toDateTimeString(); }
              //converting time according to timezone
             $row->deadline =   $date;
               
          }


        
          
        return view('todolist.list',compact('tasks'));

     }

     public function create(Request $request)
     {
        switch ($request->method()) {
            case 'POST':
            //concatinating the request time and date with deadline
            $deadline = $request->date.' '.$request->time.':00';
             
            $data = [
            "name" => $request->name,
            "deadline" => strtotime($deadline)
            ];
            $taskInfo = []; 
            
            //For Local Storage

            // $taskInfo = Storage::disk('public')->exists('data.json') ? json_decode(Storage::disk('public')->get('data.json'),true) : [];           
             
            //  array_merge($taskInfo,$data);


            //Storage::disk('public')->put('data.json', json_encode($taskInfo)); 
            

            Tasks::insert(['name'=>$request->name,'deadline'=>strtotime($deadline)]);

            return redirect('/');


          case 'GET':
                return view('todolist.create');
            default:
                // invalid request
                break;

        }
     }


}
