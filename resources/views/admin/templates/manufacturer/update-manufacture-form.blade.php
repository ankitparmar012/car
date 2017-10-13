<header class="panel-heading">
    Update {{config('constants.MANUFACTURER')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ route('admin.manufacturer.update',array('id' => $id->id_manufacturer))}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Manufacturer By</label>

                                    <input class="form-control has-feedback-left" id="manufacturer_by"
                                           name="manufacturer_by" value="{{$id->manufacturer_by}}{{ old('manufacturer_by') }}"
                                           type="text">
                                </div>
                            </div>

                           <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Manufacturer Iamge</label>
                                    <input type="file" name="manufacturer_image" id="manufacturer_image" placeholder="service Image" class="input-block-level">
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

                            <div class="col-md-4">
                                <div class="form-group">
                                <br>
                                    <button type="submit" class="btn btn-primary">{{config('constants.MANUFACTURER')}} Add</button>
                                </div>
                            </div>

                        </div>
        </form>
    </div>
</div>