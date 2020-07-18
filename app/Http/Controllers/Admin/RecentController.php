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

class RecentController extends Controller
{
    use CreateCampaignTrait;

    public function __construct(Campaign $campaign, User $user, Order $order, Product $product, Ticket $ticket)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->campaign= $campaign;
        $this->order = $order;
        $this->product = $product;
        $this->ticket = $ticket;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Campaign $campaign)
    {
        $now       = Carbon::now()->endOfDay();
        $subDay    = Carbon::now()->subDay(2)->startOfDay();
        $campaigns = $this->campaign->where('expiryDate', '>=', $subDay)
                                    ->where('expiryDate', '<=', $now)    
                                    ->paginate(10);
        return view('admin.campaign.recent.index', compact('campaigns'));
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
        return view('admin.campaign.recent.create', compact('products', 'product'));
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
       return redirect()->route('recent.index')
                        ->with('success','Campaign created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Campaign $recent)
    {
        $searchString = $request->get('searchby');

        $tickets = $this->ticket->with('user')->where('campaignsId', $recent->_id)->whereHas('user', function ($query) use ($searchString){
            if($searchString) {
                $query->where('first_name', 'like', '%'.$searchString.'%')
                     ->orWhere('last_name', 'like', '%'.$searchString.'%');
            } else {
                $query;
            }
        })->paginate(10);
        
        return view('admin.campaign.recent.show', compact('tickets', 'recent', 'searchString'));
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
