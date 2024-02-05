@extends('Layouts.admin')

@section('title')
  Email-ы для форм
@endsection

@section('formtype')
    active
@endsection

@section('content')


<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Тип формы</th>
              <th>Emails</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($formtypes as $t)

                <tr>
                    <td>{{$t->id}}</td>
                    <td>
                      {{$t->name}}
                    </td>
                    <td>{!!nl2br($t->emails)!!}</td>
                    <td><a href="{{route('admin.formtype.edit',$t->id)}}"><i class="fas fa-pen"></i></a></td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
