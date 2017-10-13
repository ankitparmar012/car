<header class="panel-heading">
    Add {{config('constants.PRODUCTS')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{route('admin.products.insert')}}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Products Category</label>
                        <select class="form-control has-feedback-left" name="fk_id_product_category">
                            <option value=" ">Select Product Category</option>
                            @foreach($aProCate as $aProCateData)
                                <option value="{{$aProCateData->id_product_category}}">{{$aProCateData->pro_cat_title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Products Title</label>
                        <input class="form-control has-feedback-left" id="pro_title"
                               name="pro_title" value="{{ old('pro_title') }}"
                               type="text">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Products Price</label>
                        <input class="form-control has-feedback-left" id="pro_price"
                               name="pro_price" value="{{ old('pro_price') }}"
                               type="text">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Products Qty</label>
                        <input class="form-control has-feedback-left" id="pro_qty"
                               name="pro_qty" value="{{ old('pro_qty') }}"
                               type="text">
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputEmail1">Status</label>

                        <select name="status" class="form-control">
                        <option value="{{config('constants.ACTIVE')}}">{{config('constants.ACTIVE')}}</option>
                        <option value="{{config('constants.INACTIVE')}}">{{config('constants.INACTIVE')}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Category Description</label>
                        <textarea class="form-control has-feedback-left" name="pro_cat_desc" id="pro_cat_desc">{{ old('pro_cat_desc') }}</textarea>
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