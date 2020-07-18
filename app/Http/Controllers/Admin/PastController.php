<?php

namespace App\Http\Controllers\Admin;

use App\Winner;
use App\Campaign;
use App\User;
use App\Order;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PastController extends Controller
{
     public function __construct(Campaign $campaign, User $user, Order $order, Winner $winner)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->campaign= $campaign;
        $this->order = $order;
        $this->winner = $winner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campaign $campaign)
    {
        $now       = Carbon::now()->startOfDay();
        $campaigns = $this->campaign->where('expiryDate', '<', $now)
                                    ->latest('_id')
                                    ->paginate(10);
        return view('admin.campaign.past.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaign.past.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $past)
    {
        $tickets = $past->tickets()->paginate(10);
        $winner = $this->winner->where('campaignId', $past->_id)
                               ->first();
        return view('admin.campaign.past.show', compact('tickets', 'past', 'winner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
