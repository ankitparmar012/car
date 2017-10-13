<header class="panel-heading">
    Update {{config('constants.JOB_CARD')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ route('admin.job-card.update',array('id' => $id->id_job_card))}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}

             <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Customer</label>
                                    <select class="form-control has-feedback-left" name="fk_id_customer">
                                     <option value=" ">Select Customer</option>
                                       @foreach($aCustomer as $aCustomerData)
                                           <option @if($id->fk_id_customer == $aCustomerData->id_customer ) SELECTED @endif value="{{$aCustomerData->id_customer}}">{{$aCustomerData->customer_name}}</option>
                                       @endforeach

                                    </select>
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Cars</label>
                                    <select class="form-control has-feedback-left" name="fk_id_car" id="fk_id_car">
                                        <option value=" ">Select Car</option>
                                        @foreach($aCars as $aCarsData)
                                            <option @if($id->fk_id_car == $aCarsData->id_car_model ) SELECTED @endif value="{{$aCarsData->id_car_model}}">{{$aCarsData->model_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="sr-input" for="exampleInputPassword2">Total Select Services Price</label>
                                     <input class="form-control" id="total_services_price"name="total_services_price" value="{{$id->total_services_price}}"  type="text">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            @foreach($aServicesCategoryList as $aServicesCategory)
                            <header class="panel-heading" style="text-align: center">
                                {{$aServicesCategory->ser_cat_title}}
                            </header>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                         @foreach($aServicesList as $index=>$aServicesData)
                                                @if($aServicesCategory->id_services_category == $aServicesData->fk_id_services_category)
                                                   @if( in_array($aServicesData->id_services, $aSelectedServices ))
                                                            <div class="col-md-4" style="font-family: cambria;">
                                                                <input onclick="UpdateGetServicesPrice(this);" id="{{$aServicesData->ser_price}}" checked name="fk_id_job_card_services[]" value="{{$aServicesData->id_services}}" type="checkbox"> {{$aServicesData->ser_title}}
                                                                <input checked name="old_fk_id_job_card_services[]" value="{{$id->id_job_card}}" type="checkbox" hidden="hidden"> {{$aServicesData->ser_title}}
                                                            </div>
                                                    @else
                                                            <div class="col-md-4" style="font-family: cambria;">
                                                            <input  onclick="UpdateGetServicesPrice(this);" name="fk_id_job_card_services[]" id="{{$aServicesData->ser_price}}" value="{{$aServicesData->id_services}}" type="checkbox"> {{$aServicesData->ser_title}}
                                                            </div>
                                                    @endif
                                                 @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="col-md-12" style="text-align: center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{config('constants.JOB_CARD')}} Add</button>
                            </div>
                        </div>

        </form>
    </div>
</div>