<header class="panel-heading">
    Add {{config('constants.SERVICES_CATEGORY')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{route('admin.services-category.insert')}}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Services Category Title</label>

                        <input class="form-control has-feedback-left" id="ser_cat_title"
                               name="ser_cat_title" value="{{ old('ser_cat_title') }}"
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
                        <label class="sr-input" for="exampleInputPassword2">Serives Description</label>
                        <textarea class="form-control has-feedback-left" name="ser_cat_desc" id="ser_cat_desc">{{ old('ser_cat_desc') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <br>
                        <button type="submit" class="btn btn-primary">{{config('constants.SERVICES_CATEGORY')}} Add</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>