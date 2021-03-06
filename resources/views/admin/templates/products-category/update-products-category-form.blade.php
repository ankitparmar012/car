<header class="panel-heading">
    Update {{config('constants.MASTER_CITY')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ route('admin.products-category.update',array('id' => $id->id_product_category))}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="col-md-12">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Products Category Title</label>
                                    <input class="form-control has-feedback-left" id="pro_cat_title"
                                           name="pro_cat_title" value="{{$id->pro_cat_title}}{{ old('pro_cat_title') }}"
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
                                    <textarea class="form-control has-feedback-left" name="pro_cat_desc" id="pro_cat_desc">{{$id->pro_cat_desc}}{{ old('pro_cat_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <br>
                                    <button type="submit" class="btn btn-primary">{{config('constants.PRODUCTS_CATEGORY')}} Add</button>
                                </div>
                            </div>

                        </div>
        </form>
    </div>
</div>