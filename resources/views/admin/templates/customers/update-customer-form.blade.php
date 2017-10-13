<header class="panel-heading">
    Update {{config('constants.CUSTOMER')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{ route('admin.customer.update',array('id' => $id->id_customer))}}">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
             <div class="col-md-12">
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="sr-input" for="exampleInputPassword2">Customer Name</label>

                                     <input class="form-control has-feedback-left" id="customer_name"
                                            name="customer_name" value="{{$id->customer_name}}{{ old('customer_name') }}"
                                            type="text">

                                 </div>
                             </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="sr-input" for="exampleInputPassword2">Email</label>
                                     <input class="form-control has-feedback-left" id="customer_email"
                                            name="customer_email" value="{{$id->customer_email}}{{ old('customer_email') }}"
                                            type="text">

                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="sr-input" for="exampleInputPassword2">Phone No</label>
                                     <input class="form-control has-feedback-left" id="phone_no"
                                            name="phone_no" value="{{$id->phone_no}}{{ old('phone_no') }}"
                                            type="text">

                                 </div>
                             </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="sr-input" for="exampleInputPassword2">Mobile No</label>
                                     <input class="form-control has-feedback-left" id="mobile_no"
                                            name="mobile_no" value="{{$id->mobile_no}}{{ old('mobile_no') }}"
                                            type="text">
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="sr-input" for="exampleInputPassword2">City</label>
                                      <input class="form-control has-feedback-left" id="city"
                                                                    name="city" value="{{$id->city}}{{ old('city') }}"
                                                                    type="text">
                                 </div>
                             </div>
                            <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="sr-input" for="exampleInputPassword2">Area</label>
                                       <input class="form-control has-feedback-left" id="area" name="area" value="{{$id->area}}{{ old('area') }}" type="text">
                                 </div>
                             </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <label class="sr-input" for="exampleInputPassword2">Pin Code</label>
                                      <input class="form-control has-feedback-left" id="p_code" name="p_code" value="{{$id->p_code}}{{ old('p_code') }}" type="text">
                                 </div>
                             </div>

                         </div>
                          <div class="col-md-12">
                             <div class="form-group">
                             <br>
                                 <button type="submit" class="btn btn-primary">{{config('constants.CUSTOMER')}} Update</button>
                             </div>
                         </div>

        </form>
    </div>
</div>