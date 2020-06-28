<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Frinner;
use App\FrinnerQueue;
use Carbon\Carbon;

class FrinnerController extends Controller
{
    
    public static function get_user_id()
    {
        return auth()->user()->id;
    }

    public static function get_given_frinners()
    {
        $user_id = Self::get_user_id();
        return Frinner::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'given');
    }

    public static function get_given_frinners_for_date(Carbon $date) {
        $user_id = Self::get_user_id();
        return Frinner::where('user_id', $user_id)
            ->whereDate('created_at', $date)->get();
    }

    public static function get_taken_frinners()
    {
        $user_id = Self::get_user_id();
        return Frinner::where('taker_id', $user_id)
            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'taken');
    }

    public static function get_available_frinner_count()
    {
        return Frinner::where('taken', false)
            ->whereDate('created_at', Carbon::now())->count();
    }

    public static function get_next_available_frinner()
    {
        $user_id = Self::get_user_id();
        return Frinner::where('taken', false)
            ->where('user_id', "!=", $user_id)
            ->whereDate('created_at', Carbon::now())->first();
    }

    public function give_frinner()
    {
        $user_id = Self::get_user_id();
        $given_frinners = Self::get_given_frinners_for_date(Carbon::now());
        
        if (count($given_frinners) == 0) {
            $frinner = Frinner::create(['user_id' => $user_id]);
            
            if (Self::has_queue()) {
                $next_user_id = Self::get_next_queue_user();
                $frinner->taker_id = $next_user_id;
                $frinner->taken = true;
                $frinner->save();
                $message = "Success! Your frinner was provided to someone in the queue!";
            } else {
                $message = "Success!";
            }

            $result = "success";
        
        } else {
            $result = "danger";
            $message = "Frinner for today already Given!";
        }
        
        return redirect()->action('HomeController@index', [
            'result' => $result,
            'message' => $message
        ]);
    }

    public function take_frinner()
    {
        $user_id = Self::get_user_id();
        $next_available_frinner = Self::get_next_available_frinner();

        if ($next_available_frinner != null) {
            $next_available_frinner->taker_id = $user_id;
            $next_available_frinner->taken = true;
            $next_available_frinner->save();

            $result = 'success';
            $message = "Frinner Successfully Taken! The matric number is: ".$next_available_frinner->user->matricNo;
        } else {
            
            if (Self::add_to_queue()) { 
                $result = 'warning';
                $message = "No Frinner available!! However, your Frinner will be added to the queue!";
            } else {
                $result = 'danger';
                $message = "No Frinner available and you are already in the queue! Please be patient :)";
            }
        }

        return redirect()->action('HomeController@index', [
            'result' => $result,
            'message' => $message
        ]);
    }

    public static function has_queue()
    {
        return FrinnerQueue::where('taken', false)
            ->whereDate('created_at', Carbon::now())->count() > 0;
    }

    public static function get_queue_count()
    {
        return FrinnerQueue::where('taken', false)
            ->whereDate('created_at', Carbon::now())->count();
    }
    
    public static function get_next_queue_user()
    {
        if (!Self::has_queue()) return false;
        
        $next_frinner_queue = FrinnerQueue::where('taken', false)
            ->whereDate('created_at', Carbon::now())->first();

        $next_frinner_queue->taken = true;
        $next_frinner_queue->save();

        return $next_frinner_queue->user_id;
    }

    public static function user_in_queue()
    {
        $user_id = Self::get_user_id();
        return FrinnerQueue::where('user_id', $user_id)
            ->whereDate('created_at', Carbon::now())
            ->where('taken', false)->count() > 0;
    }

    public static function add_to_queue()
    {
        if (Self::user_in_queue()) return false;
        $user_id = Self::get_user_id();
        FrinnerQueue::create(['user_id' => $user_id ]);
        return true;
    }

}
