@extends('layouts.master')

@section('content')

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Одоо байгаа үгнүүд</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Энгийн үг</th>
                  <th>Хүнд хэцүү үг</th>
                  <th>Тайлбар үг</th>
               
                </tr>
                </thead>
                <tbody>
                   @foreach($word as $words)
                <tr>
                  <td>{{$words->id}}</td>
                  <td>{{$words->simple_word}}</td>
                  <td>{{$words->hard_word}}</td>
                  <td>{{$words->description}}}</td>
                </tr>
               @endforeach
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

@endsection
