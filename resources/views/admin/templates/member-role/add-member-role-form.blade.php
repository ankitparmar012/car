<header class="panel-heading">
    Add {{config('constants.MEMBER_ROLE')}}
</header>
<div class="panel-body">
    <div class="row">
        <form method="post" role="form" action="{{route('admin.member-role.insert')}}">
            {{csrf_field()}}
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="sr-input" for="exampleInputPassword2">Member Role</label>

                        <input class="form-control has-feedback-left" id="member_role" placeholder="Member Role"
                               name="member_role" value="{{ old('member_role') }}"
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
                        <button type="submit" class="btn btn-primary">{{config('constants.MEMBER_ROLE')}} Add</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>