<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $resource = 'admin.product';

    public function __construct(Product $product)
    {
        $this->middleware('auth');
        $this->product = $product;
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
            $products = $this->product->where('productNameEN', 'like', '%'.$searchString.'%')
                              ->paginate($record);
        } else {
            $products = $this->product->latest()->paginate($record);
        }
        return view("{$this->resource}.index", compact('products', 'searchString', 'record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'productDetailTitleEN' => 'required',
            'productDetailTitleAR' => 'required',
            'image'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);
        
        $image_name = $request->file('image')->getRealPath();
        Cloudder::upload($image_name, null);
        $imageUrl = Cloudder::getResult();
        $keys   = [
                 'productTax', 
                 'productDetailTitle', 
                 'productDetailDes', 
                 'productName'
                ];
        $removeKeys = [
                'productTaxEN', 
                'productTaxAR', 
                'productDetailTitleEN', 
                'productDetailTitleAR', 
                'productNameEN', 
                'productNameAR', 
                'productDetailDesEN', 
                'productDetailDesAR'
                ];        
        $data = [];
        $data['productNameEN'] = "";
        $data['productNameAR'] = "";
        $data['productDetailDesEN'] = strip_tags($request->get('productDetailDesEN'));
        $data['productDetailDesAR'] = $request->get('productDetailDesAR');
        $data['productImageUrl'] = $imageUrl['secure_url'] ?? '';
        $data['productPrice']  = (float) $request->get('productPrice');
        $data['typeOfProduct'] = 'goods';
        $data['productTaxEN']  = '5% Tax';
        $data['productTaxAR']  = '5٪ ضريبة';
        $data['keys']          = $keys;
        $data['removeKeys']    = $removeKeys;
        $data['objectProcessor'] = [];
        $data['isDelete']      = false;
        $data['__v']           = 0;
        
        $request->merge($data);
        Product::create($request->all());
   
        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        #$products=product::all();
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(!empty($request->file('image'))) {
            $image_name = $request->file('image')->getRealPath();;

            Cloudder::upload($image_name, null);
            $imageUrl = Cloudder::getResult();
            $request->merge(['productImageUrl'=> $imageUrl['secure_url']]);
        }
        $data = $request->all();
        $data['productDetailDesEN'] = strip_tags($request->get('productDetailDesEN'));
        $data['productDetailDesAR'] = $request->get('productDetailDesAR');
        $data['productPrice']  = (float) $request->get('productPrice');
        $product->update( $data );
    
        return redirect()->route('product.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
    /**
     * get user block/unblock
     *
     * @param  $user
     * @return Response
     */

    public function block(Request $request, $product, $status)
    {
        $product = $this->product->find($product);
        $message = ($status) ? 'Blocked' : 'Unblock';
        $product->update(['isBlock'=> (int)$status]);
        return redirect()->back()
                        ->with('success', "Product $message successfully.");
    }
}
