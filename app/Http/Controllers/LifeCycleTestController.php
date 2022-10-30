<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class LifeCycleTestController extends Controller
{
    //
    public function showServiceContainerTest()
    {
        app()->bind('lifeCycleTest',function(){
            return 'ライフサイクルテスト'; 

        });

        $test = app()->make('lifeCycleTest');
//サービスコンテナなしのパターン  
//      $message = new Message();
//      $sample = new Sample($message);
//      $sample->run();

//サービスコンテナapp()ありのパターン 
       app()->bind('sample', Sample::class);
       $sample = app()->make('sample');
       $sample->run();

        dd($test, app());
    }
}

class sample
{
    public $message;
    public function __construct(Message $message){
       $this->message = $message;
    }
    public function run(){
       $this->message->send();
    }
}

class Message
{
    public function send(){
      
    

        echo('メッセージを表示');
    }
}

