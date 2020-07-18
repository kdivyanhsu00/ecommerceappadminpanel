<?php

namespace App\Http\Controllers\Admin;

use App\Winner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WinnersController extends Controller
{

    protected $resource = 'admin.winner';

     public function __construct(Winner $winner)
    {
        $this->middleware('auth');
        $this->winner = $winner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $searchString = $request->get('searchby');
        $record = 10;
        if($searchString) {
            $winners = $this->winner->searchBy($searchString)
                                    ->paginate($record);
        } 
        else {
            $winners = $this->winner->latest()->paginate($record);
        }
       return view("{$this->resource}.index", compact('winners', 'searchString'));
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
    public function show(User $user)
    {
        return view('admin.winners.show', compact('winners'));
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
