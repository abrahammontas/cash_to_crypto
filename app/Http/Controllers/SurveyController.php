<?php
/**
 * Created by PhpStorm.
 * User: Abraham
 * Date: 9/26/16
 * Time: 8:07 PM
 */

namespace App\Http\Controllers;

use Auth;
use App\Survey;
use Validator;
use Illuminate\Http\Request;
use Storage;
use Mail;

class SurveyController extends Controller
{
    public function save(Request $request) {

        $user = Auth::user();

        Survey::create([
            'user_id' => $user->id,
            'used_us' => $request['used_us'],
            'hear_about' => $request['hear_about'],
            'state' => $request['state']
        ]);

        return redirect()->route($user->admin ? 'admin.dashboard' : 'dashboard');
    }
}
