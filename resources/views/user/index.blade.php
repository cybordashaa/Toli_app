@extends('layouts.master')

@section('content')

<div class="">
	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"> All User </h3>
		</div>

		<div class="box-body">
			 <table class="table table-responsive">
 	<thead>
 			<tr>
 				<th>Name</th>
 				<th>email</th>
 				<th>Role</th>
 				<th>Modify</th>
 				
 			</tr>

 	</thead>
 <tbody>

 	@foreach($user as $users)
		<tr>
			<td>{{$users->name}}</td>
			<td>{{$users->email}}</td>
			<td>{{$users->user_type}}</td>
			<td>
				<button class="btn btn-info" > <a href="{{ route('user.edit', $users->id) }}">Засах</a></button>

				<button class="btn btn-danger"  data-toggle = "modal" data-target="#deleteUser" data-userid="{{$users->id}}">Устгах</button>
			</td>
		</tr>

	@endforeach
 </tbody>
 
 </table>
{{$user->links()}}
		</div>
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Шинээр үүсгэх
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Шинээр хэрэглэгч үүсгэх</h4>
      </div>
      <form action="{{ route('user.store') }}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
			
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Нэр</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">И-мэйл хаяг</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Нууц үг</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Нууц үг баталгаажуулах</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="user_type" class="col-md-4 control-label">Дүр</label>

                            <div class="col-md-6">
                                <select class="form-control" name="type">

                                	<option value="admin">Admin</option>
                                	<option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
  

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!---delete modal-->
<div class="modal modal-danger fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{ route('user.destroy','delete') }}" method="post">
      	 {{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
               
               <p class="text-center">Та энэ хэрэглэгчийг устгах уу?</p>
	      	<input type="hidden" name="user_id" id="usr_id" value="">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">Үгүй, Цуцлах</button>
	        <button type="submit" class="btn btn-warning">Тийм, Устгах</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection

