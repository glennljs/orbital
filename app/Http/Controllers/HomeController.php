<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Frinner;
use App\FrinnerQueue;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $result = null, $message = null)
    {
        $given_frinners = FrinnerController::get_given_frinners();
        $taken_frinners = FrinnerController::get_taken_frinners();
        $numFrinners = FrinnerController::get_available_frinner_count();
        $numQueue = FrinnerController::get_queue_count();

        $data = [
            'given_frinners' => $given_frinners,
            'taken_frinners' => $taken_frinners,
            'numFrinners' => $numFrinners,
            'numQueue' => $numQueue
        ]; 

        if (isset($request->result)) {
            $data += [
                'result' => $request->result,
                'message' => $request->message,
            ];
        }

        return view('home', $data);
    }

    public function profile(Request $request) 
    {
        $user = auth()->user();
        $given_frinners = FrinnerController::get_given_frinners();
        $taken_frinners = FrinnerController::get_taken_frinners();
        
        $data = [
            'user' => $user,
            'given_frinners' => count($given_frinners),
            'taken_frinners' => count($taken_frinners),
        ];

        return view('profile', $data);
    }

    public function editProfile(Request $request) 
    {
        $user = auth()->user();
        $given_frinners = FrinnerController::get_given_frinners();
        $taken_frinners = FrinnerController::get_taken_frinners();
        
        $data = [
            'user' => $user,
            'given_frinners' => count($given_frinners),
            'taken_frinners' => count($taken_frinners),
        ];

        return view('edit_profile', $data);
    }

    public function storeNewProfile(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'inputName' => ['required', 'string', 'max:255'],
            'inputUsername' => ['required', 'string', 'unique:users,username,'.$user->id],
            'inputMatricNo' => ['required', 'string', 'unique:users,matricNo,'.$user->id, 'min:9', 'max:9', 'regex:/^[A]\d{7}[A-Z]$/'],
        ]);
    
        $user->name = $request->inputName;
        $user->username = $request->inputUsername;
        $user->matricNo = $request->inputMatricNo;
        $user->save();

        return redirect('profile');
    }

    public function queue(Request $request)
    {
        $queue = FrinnerQueue::whereDate('created_at', Carbon::now())
            ->where('taken', false)->get();
        
        return view('queue', ['queue' => $queue]);
    }
}
