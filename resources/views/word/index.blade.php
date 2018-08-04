@extends('layouts.master')

@section('content')

<div class="">
	
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"> All Words</h3>
		</div>

		<div class="box-body">
			 <table class="table table-responsive">
 	<thead>
 			<tr>
 				<th>Энгийн үг</th>
 				<th>Хүнд хэцүү үг</th>
 				<th>Тайлбар үг</th>
 				<th>Modify</th>
 				
 			</tr>

 	</thead>
 <tbody>
 	@foreach($word as $words)
		<tr>
			<td>{{$words->simple_word}}</td>
			<td>{{$words->hard_word}}</td>
			<td>{{$words->description}}</td>
			<td>
				<button class="btn btn-info" data-simple="{{$words->simple_word}}" data-hard="{{$words->hard_word}}" data-description ="{{$words->description}}" data-toggle = "modal" data-word_id = "{{$words->id}}}" data-target="#edit">Засах</button>

				<button class="btn btn-danger"  data-toggle = "modal" data-target="#deleteWord" data-word_id ="{{$words->id}}">Устгах</button>
			</td>
		</tr>

	@endforeach
 </tbody>
 </table>

		</div>
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Шинээр нэмэх
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Шинэ үг нэмэх</h4>
      </div>
      <form action="{{route('word.store')}}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('word.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Нэмэх</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!---update modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
      <form action="{{ route('word.update', 'update') }}" method="post">
      	 {{method_field('patch')}}
      		{{csrf_field()}}
	      <div class="modal-body">

	      	<input type="hidden" name="word_id" id="word_id" value="">
				@include('word.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Update</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!---delete modal-->
<div class="modal modal-danger fade" id="deleteWord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{ route('word.destroy','delete') }}" method="post">
      	 {{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
               
               <p class="text-center"> энэ бичлэгийг устгах уу?</p>
	      	<input type="hidden" name="word_id" id="word_id" value="">
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