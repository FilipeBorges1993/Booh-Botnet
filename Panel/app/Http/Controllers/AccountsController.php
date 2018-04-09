<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{

    public static function mainConstructor($data){
        $take = $data['take'];
        $return = array();
        $i = 0;
        //Get The Auth User and Check if is Admin
        $user = Auth::user();
        if($user->id === 1){
            $seeMore = 0;
            //Get All the accounts
            $accounts = User::take($take)->get();
            $accountsAll = User::get()->count();
            $accountsAll > $accounts->count() ? $seeMore = 1 : $seeMore = 0;
            //Create an array
            foreach ($accounts as $account){

                $return[$i] = [
                    'id'=>$account->id,
                    'username'=>$account->username,
                    'level'=>AccountsController::userLevel($account->id),
                    'created_at'=>$account['created_at']->diffForHumans(),
                    'bots'=> $account->panelCredential()->first()->bots()->get()->count(),
                    'commands'=> AccountsController::actionHtml($account->id),
                ];

                $i++;
            }
            //Return
            return ['status'=>1,'data'=>$return,'seeMore'=>$seeMore];
        }
        return ['status'=>0];

    }

    /**
     * @param $data
     * @return int
     *
     */
    public static function userStatusMaker($data){

        //Check if the Auth user is admin
        $Admin = Auth::user();
        if($Admin->id === 1){
            $user = User::where('id', $data['id'])->first();
            if($user !== null){

                $userStatus = $user->status()->first();

                if($userStatus->status === 1){
                    $userStatus->status = 0;
                }
                else{
                    $userStatus->status = 1;
                }

                $userStatus->update();
                return 1;
            }
        }

        return 0;
    }

    /**
     * Get the user level
     * @param $id
     * @return string
     */

    private static function userLevel($id){
          $id === 1 ? $return ='Admin' : $return ='User';
        return $return;
    }

    /**
     * Make the html action from
     *
     * @param $id
     * @return html
     */

    private static function actionHtml($id){

        //Todo-> get user status
        $user = User::where('id', $id)->first();

        if($id === 1){
            return '';
        }else{
            //Verify the user status
            if($user->status()->first()->status === 0){
                return '<div class="col-centered stopBtn" data-id="'.$id.'" ><p style=" margin-top: 0px">Activate</p></div>';
            }else{
                return '<div class="col-centered stopBtn" data-id="'.$id.'" ><p style=" margin-top: 0px">Kill</p></div>';
            }

        }
    }


}
