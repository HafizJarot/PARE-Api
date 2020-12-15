<?php

namespace App\Http\Controllers\superadmin;

use App\User;
use App\Http\Controllers\Controller;
use App\Pemilik;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM as FacadesFCM;

class NotifikasiPemilikReklameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifs = Pemilik::whereHas('user', function($user){
            $user->where('status', false)->where('role', true);
        })->get();
        return view('pages.admin.notif.notif', compact('notifs'));
    }

    public function update($id)
    {
        $pemilik= Pemilik::find($id);
        $user = User::whereId($pemilik->id_user)->first();
        $user->update(['status' => true]);

        $this->notification($user);
        return redirect()->route('notif.index');
    }

    public function notification($user)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);
        $message = "akun anda berhasil di konfirmasi, silahkan login";
        $notificationBuilder = new PayloadNotificationBuilder('pare app');
        $notificationBuilder->setBody($message)->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);
        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $_data = $dataBuilder->build();

        // You must change it to get your tokens
        $token = $user->fcm_token;
        FacadesFCM::sendTo($token, $option, $notification, $_data);
        return true;
    }


    public function destroy($id)
    {
        //
    }
}
