<?php
namespace App\Http\Controllers\Admin;

use App\User;
use App\Order;
use App\Campaign;
use App\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Order $order, Campaign $campaign, Winner $winner)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->order = $order;
        $this->campaign = $campaign;
        $this->winner = $winner;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userLast5MonthCount = $this->user->where('created', '>=', Carbon::now()->subMonth(6)->startOfMonth())
                                 ->where('created', '<=', Carbon::now()->endOfMonth())   
                                 ->count();
        
        $userMon1Count = $this->user->where('created', '>=' ,Carbon::now()->startOfMonth())
                                 ->where('created', '<=', Carbon::now()->endOfMonth())   
                                 ->count();
        $userMon2Count = $this->user->where('created', '>=', Carbon::now()->subMonth(1)->startOfMonth())
                                 ->where('created', '<=', Carbon::now()->subMonth(1)->endOfMonth())   
                                 ->count();
                       
        $userMon3Count = $this->user->where('created', '>=' ,Carbon::now()->subMonth(2)->startOfMonth())
                                 ->where('created', '<=', Carbon::now()->subMonth(2)->endOfMonth())   
                                 ->count();                                                  
        $userMon4Count = $this->user->where('created', '>=' ,Carbon::now()->subMonth(3)->startOfMonth())
                                 ->where('created', '<=', Carbon::now()->subMonth(3)->endOfMonth())   
                                 ->count();

        $userMon5Count = $this->user->where('created', '>=', Carbon::now()->subMonth(4)->endOfMonth())
                                 ->where('created', '<=', Carbon::now()->subMonth(4)->endOfMonth())   
                                 ->count();
        $userMon6Count = $this->user->where('created', '>=', Carbon::now()->subMonth(5)->endOfMonth())
                                 ->where('created', '<=', Carbon::now()->subMonth(5)->endOfMonth())   
                                 ->count();

        $month = Carbon::now()->format('M');
        $prevM1 = Carbon::now()->subMonth(1)->format('M');
        $prevM2 = Carbon::now()->subMonth(2)->format('M');
        $prevM3 = Carbon::now()->subMonth(3)->format('M');
        $prevM4 = Carbon::now()->subMonth(4)->format('M');
        $prevM5 = Carbon::now()->subMonth(5)->format('M');
        $prevM6 = Carbon::now()->subMonth(6)->format('M');
        
        $activeUsers =$this->user->where('isBlock', 0)->count();

        # Total Income Last 7 Days
        $order1Count = $this->order->where('created', '<=' ,Carbon::now()->startOfDay())
                                       ->where('created', '>=' ,Carbon::now()->endOfDay()) 
                                       ->sum('totalAmt');
                             
        $order2Count = $this->order->where('created', '<=', Carbon::now()->subDays(1)->startOfDay())
                                       ->where('created', '>=', Carbon::now()->subDays(1)->endOfDay())      
                                       ->sum('totalAmt');

        $order3Count = $this->order->where('created', '<=', Carbon::now()->subDays(2)->startOfDay())
                                       ->where('created', '>=', Carbon::now()->subDays(2)->endOfDay())      
                                       ->sum('totalAmt');

        $order4Count = $this->order->where('created', '<=', Carbon::now()->subDays(3)->startOfDay())
                                       ->where('created', '>=', Carbon::now()->subDays(3)->endOfDay())      
                                       ->sum('totalAmt');

        $order5Count = $this->order->where('created', '<=', Carbon::now()->subDays(4)->startOfDay())
                                       ->where('created', '>=', Carbon::now()->subDays(4)->endOfDay())      
                                       ->sum('totalAmt');

        $order6Count = $this->order->where('created', '<=', Carbon::now()->subDays(5)->startOfDay())
                                       ->where('created', '>=', Carbon::now()->subDays(5)->endOfDay())      
                                       ->sum('totalAmt');

        $order7Count = $this->order->where('created', '<=', Carbon::now()->subDays(6)->startOfDay())
                                       ->where('created', '>=', Carbon::now()->subDays(6)->endOfDay())      
                                       ->sum('totalAmt');
        
        $today = Carbon::now()->format('D');
        $prev1 = Carbon::now()->subDays(1)->format('D');
        $prev2 = Carbon::now()->subDays(2)->format('D');
        $prev3 = Carbon::now()->subDays(3)->format('D');
        $prev4 = Carbon::now()->subDays(4)->format('D');
        $prev5 = Carbon::now()->subDays(5)->format('D');
        $prev6 = Carbon::now()->subDays(6)->format('D');

        # Total Income
        $orderMon1Count = $this->order->where('created', '>=' , Carbon::now('m')->startOfMonth())
                                 ->where('created', '<=', Carbon::now('m')->endOfMonth()
                                 ->subMonth(1))   
                                 ->sum('totalAmt');
        $orderMon2Count = $this->order->where('created', '>=' , Carbon::now('m')->subMonth(1)->startOfMonth())
                                 ->where('created', '<=' , Carbon::now('m')->subMonth(1)->endOfMonth())   
                                 ->sum('totalAmt');
        $orderMon3Count = $this->order->where('created', '>=' , Carbon::now('m')->subMonth(2)->startOfMonth())
                                 ->where('created', '<=' , Carbon::now('m')->subMonth(2)->endOfMonth())   
                                 ->sum('totalAmt');                                                  
        $orderMon4Count = $this->order->where('created', '>=' , Carbon::now('m')->subMonth(3)->startOfMonth())
                                 ->where('created', '<=', Carbon::now('m')->subMonth(3)->endOfMonth())   
                                 ->sum('totalAmt');

        $orderMon5Count = $this->order->where('created', '>=' , Carbon::now('m')->subMonth(4)->startOfMonth())
                                 ->where('created', '<=', Carbon::now('m')->subMonth(4)->endOfMonth())   
                                 ->sum('totalAmt');
        $orderMon6Count = $this->order->where('created', '>=' , Carbon::now('m')->subMonth(5)->startOfMonth())
                                 ->where('created', '<=', Carbon::now('m')->subMonth(5)->endOfMonth())
                                 ->sum('totalAmt');
        # End of total income
        $monthCount = Carbon::now()->format('M');
        $prevM1Count = Carbon::now()->subMonth(1)->format('M');
        $prevM2Count = Carbon::now()->subMonth(2)->format('M');
        $prevM3Count = Carbon::now()->subMonth(3)->format('M');
        $prevM4Count = Carbon::now()->subMonth(4)->format('M');
        $prevM5Count = Carbon::now()->subMonth(5)->format('M');
        $prevM6Count = Carbon::now()->subMonth(6)->format('M');

        $campaigns    = $this->campaign->where('isSoldOut', true)->get();
        $latestWinner = $this->winner->latest('_id')->first();
        
        return view('admin.dashboard.index', compact('userLast5MonthCount', 'campaigns','month', 'prevM1', 'prevM2', 'prevM3', 'prevM4', 'prevM5', 'prevM6', 'userMon1Count', 'userMon2Count', 'userMon3Count', 'userMon4Count', 'userMon5Count', 'userMon6Count', 'activeUsers', 'today', 'prev1', 'prev2', 'prev3', 'prev4','prev5', 'prev6', 'order1Count', 'order2Count', 'order3Count', 'order4Count', 'order5Count', 'order6Count', 'order7Count', 'orderMon1Count', 'orderMon2Count', 'orderMon3Count', 'orderMon4Count', 'orderMon5Count', 'orderMon6Count', 'monthCount', 'prevM1Count','prevM2Count','prevM3Count','prevM4Count','prevM5Count', 'latestWinner'));
    }
    
}
