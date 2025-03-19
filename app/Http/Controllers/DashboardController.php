<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\College;
use App\Models\Partylist;
use App\Models\Organization;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Voter;
use App\Models\CastedVote;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'usersCount' => User::count(),
            'collegesCount' => College::count(),
            'partylistsCount' => Partylist::count(),
            'organizationsCount' => Organization::count(),
            'positionsCount' => Position::count(),
            'candidatesCount' => Candidate::count(),
            'votersCount' => Voter::count(),
            'castedVotesCount' => CastedVote::count(),
        ]);
    }
}
