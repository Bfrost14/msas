<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(User $user)
    {
        $users = User::count();
        return view('back.home', compact('users'));
    }

    public function purge($model)
    {
        $model = 'App\Models\\' . ucfirst($model);
        DB::table('notifications')->where('notifiable_type', $model)->delete();
        return back();
    }

}
