<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\User;
use App\Product;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $resource = 'admin.user';

    public function __construct(User $user, Order $order, Product $product)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->product= $product;
        $this->order=$order;
    }

    public function index(Request $request)
    {
        $userCount = $this->user->count();
        $searchString = $request->get('searchby');
        $record = $request->get('record') ? (int) $request->get('record') : 10;        
        if($searchString) {
            $users = $this->user->where('first_name', 'like', '%'.$searchString.'%')
                            ->orWhere('last_name', 'like', '%'.$searchString.'%')
                             ->orWhere('mobile', 'like', '%'.$searchString.'%')    
                              ->paginate($record);
        } else {
            $users = $this->user->latest()->paginate($record);
        }
        return view("{$this->resource}.index", compact('users','userCount', 'searchString', 'record'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user, Order $order)
    {
        $date = ($request->get('date')) ? Carbon::parse($request->get('date')) : Carbon::now();
        # dd($date);
        $orderCount = ($user->tickets) ? $user->tickets()->where('created', '<=', $date)->count() : 0;
        $orders     = $user->tickets()->where('created', '<=', $date)->paginate(5);     
        return view('admin.user.show', compact('user','orderCount', 'orders', 'date'));
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

    public function block(Request $request, $user)
    {
        $status = $request->get('status');
        $user = $this->user->find($user);
        $message = ($status) ? 'Blocked' : 'Unblock';
        $user->update(['isBlock'=> (int)$status]);
        return redirect()->back()
                        ->with('success', "User $message successfully.");
    }
}
