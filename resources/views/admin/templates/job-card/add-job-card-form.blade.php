<style>
.adv-table .dataTables_filter label input{
width: 67%;
}
</style>
<header class="panel-heading">
    Add {{config('constants.JOB_CARD')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{route('admin.job-card.insert')}}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Customer</label>
                        <select class="form-control has-feedback-left" name="fk_id_customer">
                         <option value=" ">Select Customer</option>
                            @foreach($aCustomer as $aCustomerData)
                                <option  value="{{$aCustomerData->id_customer}}">{{$aCustomerData->customer_name}}</option>
                            @endforeach
                            {{--@foreach($aProCate as $aProCateData)
                                <option value="{{$aProCateData->id_product_category}}">{{$aProCateData->pro_cat_title}}</option>
                            @endforeach--}}
                        </select>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Cars</label>
                        <select class="form-control has-feedback-left" name="fk_id_car" id="fk_id_car">
                            <option value=" ">Select Car</option>
                            @foreach($aCars as $aCarsData)
                                <option  value="{{$aCarsData->id_car_model}}">{{$aCarsData->model_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Total Select Services Price</label>
                         <input class="form-control" id="total_services_price"name="total_services_price" value="0"  type="text">
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
                                <div class="col-md-4" style="font-family: cambria;">
                                        <input id="checkbox_{{$aServicesData->id_services}}" name="fk_id_job_card_services[]" value="{{$aServicesData->ser_price}}" type="checkbox" onclick="GetServicesPrice({{$aServicesData->id_services}});"> {{$aServicesData->ser_title}}
                                </div>
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