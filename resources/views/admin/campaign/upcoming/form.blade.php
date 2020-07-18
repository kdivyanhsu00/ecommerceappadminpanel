<div class="row">
    <div class="col-sm-6">
        <div class="row">
        <div class="col-sm-6">
            <div class="cadd">
                <label class="label" style="text-align: left;">Select product for this campaign</label>
                <select class="form-control input-border" id="productId" name="productId" required data-url="">
                    <option value="">Select</option>
                    @foreach($products as $key=>$value)
                    @if((!empty($product) && $product->_id == $key) || (isset($upcoming) && $upcoming->productId == $key))
                    <option value="{{ $key }}" selected>{{ $value }}</option>
                    @else
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="cadd">
                <label class="label" style="text-align: left;">Set product price (include tax)</label>
                <div class="pull-left">
                <input type="text" class="input form-control input-border decimal pull-left" id = "caption" placeholder="Type caption here" name="campaignsPrize" required value="{{ (isset($upcoming) && $upcoming->campaignsPrize) ? $upcoming->campaignsPrize/100 : '' }}">
                </div>
                <div class="pull-left">&nbsp;AED</div>
            </div>
        </div>
        </div>
       
        @if(!empty($product) && $product->productImageUrl)
        <br>
        <div class="row">
            
            <div class="col-sm-12">
                <span style="font-size:10px;" >
                    <div class="col-sm-4">
                    <img src="{{ $product->productImageUrl }}"style="width:150px; border:1px solid #53004B">
                    </div>
                    <div class="col-sm-8">
                    {{ $product->productDetailDesEN }} Buy a Ballpoint pen for US$ 265 Buy a Ballpoint pen for US$ 265Buy a Ballpoint pen for US$ 265
                    </div>    
                    </span>
            </div>
        </div>
        @endif
        
        <div class="row">
        <div class="col-sm-6">
        <div class="cadd">
            <label class="label" style="text-align: left;">Set unit for sell</label>
            <select class="form-control input-border" name="totalQuantity" required>
                    <option value="">Select</option>
                    @for($i = 1; $i<50; $i++)
                    <option value="{{ $i }}" {{ (isset($upcoming) && $upcoming->totalQuantity == $i) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="cadd">
            <label class="label" style="text-align: left;">Campaign Type</label>
            <select class="form-control input-border" name="campaignType" required>
                <option value="goods" {{ (isset($upcoming) && $upcoming->campaignType =='goods'
                    ) ? 'selected' : '' }}>Goods</option>
                <option value="cash" {{ (isset($upcoming) && $upcoming->campaignType =='cash'
                    ) ? 'selected' : '' }}>Cash</option>
            </select>
        </div>
        </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
            <label class="label" style="text-align: left;">Launch Date</label>
            <div class="input-group date datepicker" data-date-format="dd/mm/yyyy">
                <input class="form-control calander input-border" name="launchDate" type="text" id="launchDate" value="{{ (isset($upcoming) && $upcoming->launchDate) ? $upcoming->launchDate->format('d/m/Y') : '' }}" required readonly />
                <span class="input-group-addon" style="border-color:#53004B;"><img src="{{ asset('img/cal.svg')}}" style="height:20px;object-fit:contain;"></span>
            </div>
            </div>
            <div class="col-sm-6">
            <label class="label" style="text-align: left;">Expire Date</label>

            <div class="input-group date exp-datepicker" data-date-format="dd/mm/yyyy">
                <input class="form-control calander input-border" name="expireDate" id="expireDate" type="text" value="{{ (isset($upcoming) && $upcoming->expireDate) ? $upcoming->expireDate->format('d/m/Y') : '' }}" required readonly />
                <span class="input-group-addon" style="border-color:#53004B;"><img src="{{ asset('img/cal.svg')}}" style="height:20px;object-fit:contain;"></span>
            </div>
            </div>
        </div>

        <div class="row">
        <div class="col-sm-6">
        <div class="cadd">
        <label class="label" style="text-align: left;">Price Image</label>
        <div class="form-control drag">
        <input type="file" name="prize_image" id="prize-img" style="border-color:#53004B;" @if(empty($upcoming)) required @endif><p>Image+ </p>
        </div>
        <br>
        <div class="progress prize hide">
          <div class="progress-bar" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:70%">
            <span class="sr-only">70% Complete</span>
          </div>
        </div>
        <img src="" id="prize-preview" width="150px" class="hide" />
        <br>
        <br>
        </div>
        </div>

        <div class="col-sm-6">
        <div class="cadd">
        <label class="label" style="text-align: left;">Product & Campaign combine Image</label>
        <div class="form-control drag">
        <input type="file" name="combine_image" id="select-img" style="border-color:#53004B;" @if(empty($upcoming)) required @endif><p>Image+ </p>
        </div>
        <br>
        <div class="progress combine hide">
          <div class="progress-bar" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:70%">
            <span class="sr-only">70% Complete</span>
          </div>
        </div>
        <img src="" id="img-preview" width="150px" class="hide" />
        <br>
        <br>
        </div>
        </div>
        </div>

    </div>
    
    <div class="col-sm-6">
        <div class="col-sm-6">
            <div class="cadd">
                <label class="label pull-left">Campaign Name(English)</label>
                <input type="text" class="form-control input-border" name="campaignLabelEN" required value="{{ $upcoming->campaignLabelEN ?? null }}">
            </div>
        </div> 

        <div class="col-sm-6">
            <div class="cadd">
                <label class="label">Number of ticket on purchage</label>
                <select class="form-control input-border" name="ticket" required>
                    <option value="">Number of ticket</option>
                    @for($i = 1; $i<10; $i++)
                    <option value="{{ $i }}" {{ (isset($upcoming) && $upcoming->ticket == $i) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>  

        <div class="col-sm-6">
            <div class="cadd">
                <label class="label pull-left">Campaign Name(Arabic)</label>
                <input type="text" class="form-control input-border" name="campaignLabelAR" value="{{ $upcoming->campaignLabelAR ?? null }}">
            </div>
        </div> 

        <div class="col-sm-12">
        <div class="cadd">
            <label class="label" style="text-align: left;"> Campaign details(English)</label>
            <textarea class="form-control ckeditor"  style="border-color:#53004B;" name="newSpecificationEN" required>{{ $upcoming->newSpecificationEN ?? null }}</textarea>
        </div>
        <br>
        <div class="cadd">                      
            <label class="label" style="text-align: left;"> Campaign details(Arabic)</label>
            <textarea class="form-control ckeditor"  style="border-color:#53004B;" name="newSpecificationAR" required>{{ $upcoming->newSpecificationAR ?? null }}</textarea>
        </div>
    </div>

    </div>    
</div>