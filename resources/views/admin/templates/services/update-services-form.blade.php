<header class="panel-heading">
    Update {{config('constants.MASTER_CITY')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ route('admin.services.update',array('id' => $id->id_services))}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Services Category</label>
                                    <select class="form-control has-feedback-left" name="fk_id_services_category">
                                      @foreach($aSerCat as $aSerCatData)
                                            <option value="{{$aSerCatData->id_services_category}}">{{$aSerCatData->ser_cat_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Services Title</label>
                                    <input class="form-control has-feedback-left" id="ser_title"
                                           name="ser_title" value="{{$id->ser_title}}{{ old('ser_title') }}"
                                           type="text">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Services Price</label>
                                    <input class="form-control has-feedback-left" id="ser_price"
                                           name="ser_price" value="{{$id->ser_price}}{{ old('ser_price') }}"
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
                                    <label class="sr-input" for="exampleInputPassword2">Services Description</label>
                                    <textarea class="form-control has-feedback-left" name="ser_cat_desc" id="ser_cat_desc">{{$id->ser_cat_desc}}{{ old('ser_cat_desc') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <br>
                                    <button type="submit" class="btn btn-primary">{{config('constants.SERVICES')}} Add</button>
                                </div>
                            </div>

                        </div>
        </form>
    </div>
</div>