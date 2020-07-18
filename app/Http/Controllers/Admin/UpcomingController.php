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

class UpcomingController extends Controller
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
        $now     = Carbon::now()->startOfDay();
        $campaigns = $this->campaign->where('launchDate', '>=', $now)
                                    ->latest('_id')
                                    ->paginate(10);

        return view('admin.campaign.upcoming.index', compact('campaigns'));
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
        return view('admin.campaign.upcoming.create', compact('products', 'product'));
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
        
        return redirect()->route('upcoming.index')
                        ->with('success','Campaign created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Campaign $upcoming)
    {
        $tickets = $upcoming->tickets()->paginate(10);
        $now = Carbon::now();
        $winner = $this->winner->where('campaignId', $upcoming->_id)
                               ->first();  
        return view('admin.campaign.upcoming.show', compact('tickets', 'upcoming', 'winner', 'now'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Campaign $upcoming)
    {
        $product = '';
        if(!empty($request->get('id'))) {
            $product = $this->product->find($request->get('id'));
        }
        $products = $this->product->pluck('productNameEN', '_id');
        return view('admin.campaign.upcoming.edit', compact('products', 'product', 'upcoming'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $upcoming)
    {
        if(!empty($request->file('prize_image'))) {
            $prizeImage = $request->file('prize_image')->getRealPath();
            Cloudder::upload($prizeImage, null);
            $prizeImageUrl = Cloudder::getResult();
        }
        if(!empty($request->file('combine_image'))) {
            $combineImage = $request->file('combine_image')->getRealPath();
            Cloudder::upload($combineImage, null);
            $combineImageUrl = Cloudder::getResult();
        }
        $campaignTermEN   = [
                 'productTax', 
                 'productDetailTitle', 
                 'productDetailDes', 
                 'productName'
                ]; 
        $campaignTermAR = [ 
                    "تحديد السوق المستهدف"
        ];
        $campaignSpecificationEN = [ 
                'The first type of campaign that we will discuss is the digital marketing campaign',
        ];
        $campaignSpecificationAR = [ 
        "تحديد السوق المستهدف"
        ];
        $keys = [ 
        "campaignLabel", 
        "campaignDes", 
        "campaignTerm", 
        "campaignSpecification", 
        "newSpecification"
        ];
        $removeKeys = [ 
            "campaignLabelEN", 
            "campaignLabelAR", 
            "campaignDesEN", 
            "campaignDesAR", 
            "campaignTermEN", 
            "campaignTermAR", 
            "campaignSpecificationEN", 
            "campaignSpecificationAR", 
            "newSpecificationEN", 
            "newSpecificationAR"
        ];
        $objectProcessor = [ 
            "productId"
        ];
        $data = [];
        $data['productId']  = new \MongoDB\BSON\ObjectID($request->get('productId'));
        $data['campaignsPrize']  = (int) $request->get('campaignsPrize')*100;
        $data['soldOut']  = (int) 0;
        $data['totalQuantity']  = (int) $request->get('totalQuantity');
        if(!empty($prizeImageUrl['secure_url'])) {
            $data['prizeUrl']     = $prizeImageUrl['secure_url'];
        }
        if(!empty($combineImageUrl['secure_url'])) {
            $data['campaignUrl']  = $combineImageUrl['secure_url'];;
        }
        
        $data['campaignTermEN'] = $campaignTermEN;
        $data['campaignTermAR'] = $campaignTermAR;
        $data['campaignDesEN'] = $request->get('campaignDesEN') ?? "";
        $data['campaignDesAR'] = $request->get('campaignDesAR') ?? "";
        $data['campaignSpecificationEN'] = $campaignSpecificationEN;
        $data['campaignSpecificationAR'] = $campaignSpecificationAR;
        $data['campaignDesEN'] = "";
        $data['campaignDesAR'] = "";
        $data['soldPercentage']     =  (int) 6;
        $data['campaignType']       = 'goods';
        $data['keys']               = $keys;
        $data['removeKeys']         = $removeKeys;
        $data['objectProcessor']    = $objectProcessor;
        $data['isActive']           = true;
        $data['isSoldOut']          = false;
        $data['ticket']             = (int) $request->get('ticket');
        $data['points']             = 10;
        $launch                     = explode('/', $request->get('launchDate'));
        $exp                        = explode('/', $request->get('expireDate'));
        $data['launchDate']         = new UTCDateTime(strtotime($launch[2].'-'.$launch[1].'-'.$launch[0]) * 1000);
        $data['expireDate']         = new UTCDateTime(strtotime($exp[2].'-'.$exp[1].'-'.$exp[0]) * 1000);
        $data['__v']                = 0;
        $request->merge($data);
        
        #update
        $upcoming->update($request->all());

        # Render
        return redirect()->route('upcoming.index')
                        ->with('success','Campaign updated successfully.');
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
                        ->with('success','Campaign created successfully.');
        } else {
            return redirect()->back()
                        ->with('error', 'Ticket Not found.');
        }                
    }                    
}
