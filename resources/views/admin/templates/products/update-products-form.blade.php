<header class="panel-heading">
    Update {{config('constants.MASTER_CITY')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ route('admin.products.update',array('id' => $id->id_product))}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Products Category</label>
                                    <select class="form-control has-feedback-left" name="fk_id_product_category">
                                     <option value=" ">Select Product Category</option>
                                        @foreach($aProCate as $aProCateData)
                                            <option @if($aProCateData->id_product_category == $id->fk_id_product_category) SELECTED @endif value="{{$aProCateData->id_product_category}}">{{$aProCateData->pro_cat_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Products Title{{$id->fk_id_product_category}}</label>
                                    <input class="form-control has-feedback-left" id="pro_title"
                                           name="pro_title" value="{{$id->pro_title}}{{ old('pro_title') }}"
                                           type="text">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Products Price</label>
                                    <input class="form-control has-feedback-left" id="pro_price"
                                           name="pro_price" value="{{$id->pro_price}}{{ old('pro_price') }}"
                                           type="text">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Products Qty</label>
                                    <input class="form-control has-feedback-left" id="pro_qty"
                                           name="pro_qty" value="{{$id->pro_qty}}{{ old('pro_qty') }}"
                                           type="text">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputEmail1">Status</label>

                                    <select name="status" class="form-control">
                                    <option @if($id->status == "{{config('constants.ACTIVE')}}") SELECTED @endif value="{{config('constants.ACTIVE')}}">{{config('constants.ACTIVE')}}</option>
                                    <option @if($id->status == "{{config('constants.INACTIVE')}}") SELECTED @endif value="{{config('constants.INACTIVE')}}">{{config('constants.INACTIVE')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Category Description</label>
                                    <textarea class="form-control has-feedback-left" name="pro_cat_desc" id="pro_cat_desc">{{$id->pro_cat_desc}}{{ old('pro_cat_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <br>
                                    <button type="submit" class="btn btn-primary">{{config('constants.PRODUCTS')}} Add</button>
                                </div>
                            </div>

                        </div>
        </form>
    </div>
</div>