<header class="panel-heading">
    Add {{config('constants.MASTER_CITY')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{route('admin.master-city.insert')}}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">City Name</label>

                        <input class="form-control has-feedback-left" id="name" placeholder="City Name"
                               name="name" value="{{ old('name') }}"
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
                        <button type="submit" class="btn btn-primary">{{config('constants.MASTER_CITY')}} Add</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>