<?php

namespace App\Http\Traits;

use JD\Cloudder\Facades\Cloudder;
use MongoDB\BSON\UTCDateTime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

trait CreateCampaignTrait
{

    /**
     * Record is created by the Profile
     *
     * @return Relation
     */
    public function createCampaign($request)
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
        $data['prizeUrl']     = $prizeImageUrl['secure_url'] ?? '';
        $data['campaignUrl']  = $combineImageUrl['secure_url'] ?? '';
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
        
        $this->campaign->create($request->all());
    }
}
