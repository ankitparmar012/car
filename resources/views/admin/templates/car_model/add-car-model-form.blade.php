<header class="panel-heading">
    Add {{config('constants.CAR_MODEL')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{route('admin.car-model.insert')}}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Manufacturer</label>
                        <select class="form-control has-feedback-left" name="fk_id_manufacturer">
                          @foreach($aManfacturer as $aManfacturerData)
                                <option value="{{$aManfacturerData->id_manufacturer}}">{{$aManfacturerData->manufacturer_by}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Model Name</label>
                        <input class="form-control has-feedback-left" id="model_name"
                               name="model_name" value="{{ old('model_name') }}"
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
                <div class="col-md-4">
                    <div class="form-group">
                    <br>
                        <button type="submit" class="btn btn-primary">{{config('constants.CAR_MODEL')}} Add</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>