<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Transits;
use App\Http\Models\Interpretations;
use App\Http\Models\MoonInterpretations;
use Validator;
use Session;
use Redirect;
use App\Http\Models\Account;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'destroy']);
        $this->user = \Auth::User();
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function login()
    {
        if (!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
            'message' => 'Lütfen giriş bilgilerinizi kontrol ediniz.'
            ]);
        } else {
            $user = Auth::user();
            //$user->account->updateLastLogin();
            return redirect('/api/projects/1');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function home()
    {
        // if (\Auth::check()) {
            // $user = Auth::user();
            // $transits = new Transits();
            // $interpretations = new Interpretations();
            // $moonInterpretations = new moonInterpretations();

            // $transitsnow = $transits->transitsNow($user);
            // $dailyFreePrediction = $moonInterpretations->getDailyMoonInterpretation($user->chart->ac_sign);

            // if (isset($user->account->predictions) &&  $user->account->predictions == 1) {
                // $dailyPredictions = $interpretations->getDailyInterpretations($user);
            // }

            // return view('sessions.home', compact('transitsnow', 'dailyPredictions', 'dailyFreePrediction', 'user'));
        // } else {
            return redirect('/app/projects/1');
        // }
    }

    public function setlocale($locale = 'tr')
    {
        if (!in_array($locale, ['tr', 'en'])) {
            $locale = 'tr';
        }
        Session::put('locale', $locale);
        return Redirect::back();
    }
}
