@extends('Layouts.admin')

@section('title')
    Контакты
@endsection

@section('contact')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.contact.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
    </div>
  </div>
  <br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Название</th>
              <th>Ссылка</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($contacts as $contact)

                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->link}}</td>
                    <td>
                      <form method="post" action="{{route('admin.contact.destroy',$contact->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.contact.edit',$contact->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.contact.show',$contact->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection