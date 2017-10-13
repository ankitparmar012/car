<header class="panel-heading">
    {{config('constants.USERS')}} Add
</header>

<div class="panel-body">
    <div class="row">

        <form method="post" action="{{ Route('admin.user.insert') }}" id="user_form_add">
            {{csrf_field()}}

            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">User Name *:</label>

                        <input class="form-control has-feedback-left" id="name" placeholder="Enter user Name"
                               name="name" value="{{ old('name') }}"
                               type="text">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputEmail1">Email *</label>

                        <input class="form-control has-feedback-left" id="slug" placeholder="Enter email address.."
                               name="email" value="{{ old('email') }}" type="email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">User Password *:</label>

                        <input class="form-control has-feedback-left" id="password" placeholder="Enter user password"
                               name="password" value="{{ old('password') }}"
                               type="text">
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-input" for="exampleInputPassword2">Mobile No :</label>

                        <input class="form-control has-feedback-left" id="mobile_no" placeholder=""
                               name="mobile_no" value="{{ old('mobile_no') }}"
                               type="text">
                    </div>
                </div>
             <div class="col-md-4">
                   <div class="form-group">
                       <label class="sr-input" for="exampleInputEmail1">User Type</label>
                       <select name="user_type" id="user_type" class="form-control">
                       <option value="ADMIN">Admin</option>
                       <option value="INPECTER">Inpecter</option>
                       </select>
                   </div>
               </div>
            </div>


            <div class="col-md-12" style="text-align: center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add {{config('constants.USERS')}}</button>
                </div>
            </div>

        </form>
    </div>
</div>