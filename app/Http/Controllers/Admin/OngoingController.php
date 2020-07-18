<?php

namespace App\Http\Controllers\Admin;

use App\Winner;
use App\Campaign;
use App\User;
use App\Order;
use App\Product;
use App\Ticket;
use App\TicketCoupon;
use Carbon\Carbon;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MongoDB\BSON\UTCDateTime;
use App\Http\Traits\CreateCampaignTrait;

class OngoingController extends Controller
{
    use CreateCampaignTrait;


     public function __construct(Campaign $campaign, User $user, Order $order, Winner $winner, Ticket $ticket, TicketCoupon $ticketCoupon, Product $product)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->campaign= $campaign;
        $this->order = $order;
        $this->winner = $winner;
        $this->ticket = $ticket;
        $this->ticketCoupon = $ticketCoupon;
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campaign $campaign)
    {
        $now       = Carbon::now()->startOfDay();
        $campaigns = $this->campaign->where('launchDate', '>=', $now)
                                    ->where('expiryDate', '<=', $now)
                                    ->latest('_id')
                                    ->paginate(10);           

        return view('admin.campaign.ongoing.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = '';
        if(!empty($request->get('id'))) {
            $product = $this->product->find($request->get('id'));
        }
        $products = $this->product->pluck('productNameEN', '_id');
        return view('admin.campaign.ongoing.create', compact('products', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->createCampaign($request);
        
        return redirect()->route('ongoing.index')
                        ->with('success','Campaign created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $ongoing)
    {
        $tickets = $ongoing->tickets()->paginate(10);
        $now = Carbon::now();
        $winner = $this->winner->where('campaignId', $ongoing->_id)
                               ->first();
        return view('admin.campaign.ongoing.show', compact('tickets', 'ongoing', 'winner', 'now'));
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

    public function announce($campId)
    {
        $campaign = $this->campaign->where('_id', $campId)->first();

        if($campaign->tickets->isNotEmpty()) {
        $j = 0;
        foreach($campaign->tickets as $ticket) {
            if(!empty($ticket->ticketCount)) {
                for($i=0; $i<$ticket->ticketCount; $i++) {
                    $data['ticketId']    = $ticket->_id;
                    $data['userId']      = $ticket->userId;
                    $data['campaignsId'] = $campId;
                    $data['isWinner']    = false;
                    $data['ticketNumber'] = $ticket->ticketNumber;
                    $data['__v']         = 0;
                    $this->ticketCoupon->create($data);
                $j++;    
                }
            }
        $j++;    
        }
        $ticketCoupon = $this->ticketCoupon->where('campaignsId', $campId)->limit(1)->skip(rand ( 0 , $j))->first();
        $data['isWinner'] = true;
        $ticketCoupon->update($data);

        # Crete Winner
        $data['userId']       = $ticketCoupon->userId;
        $data['campaignId']   = $campId;
        $data['ticketId']     = $ticketCoupon->ticketId;
        $data['ticketNumber'] = $ticketCoupon->ticketNumber;
        $data['__v']          = 0;
        $this->winner->create($data);

        # Ticket Close
        $this->ticket->where('campaignsId', $campId)->update(['isClose'=> true]);

        return redirect()->back()
                        ->with('success','Winner announce successfully.');
        } else {
            return redirect()->back()
                        ->with('error', 'Ticket Not found.');
        }                
    }

    public function winner($campId, $tid)
    {
        $campaign = $this->campaign->where('_id', $campId)->first();

        if($campaign->tickets->isNotEmpty()) {
        $ticket = $campaign->tickets->where('_id', $tid)->first();

        # Crete Winner
        $data['userId']       = $ticket->userId;
        $data['campaignId']   = $campId;
        $data['ticketId']     = $ticket->_id;
        $data['ticketNumber'] = $ticket->ticketNumber;
        $data['__v']          = 0;
 
        $this->winner->create($data);

        # Ticket Close
        $campaign->tickets()->where('_id', $tid)->update(['isClose'=> true]);

        return redirect()->back()
                        ->with('success','Winner announce successfully.');
        } else {
            return redirect()->back()
                        ->with('error', 'Ticket Not found.');
        }                
    }                
}
