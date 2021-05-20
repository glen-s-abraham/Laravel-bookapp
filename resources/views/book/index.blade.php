@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if(Session::has('message'))
          <div class="alert alert-success">
            {{Session::get('message')}}
          </div>
        @endif
        <div class="card mt-5">
          <div class="card-header">
            List Of Books
          </div>
          <div class="card-body"> 
              <table class="table">
              <thead>
                <tr>
                  
                  <th scope="col">Name of Book</th>
                  <th scope="col">Decription</th>
                  <th scope="col">Category</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @forelse($books as $book) 
                <tr>
                  <td>
                    @if($book->image)
                    <img src="{{Storage::url($book->image)}}" width="80">
                    @else
                    <img src="./img/test.jpeg">
                    @endif
                  </td>
                  <td>{{$book["name"]}}</td>
                  <td>{{$book["description"]}}</td>
                  <td>{{$book["category"]}}</td>
                  <td> 
                    <a href="{{route('book.edit',$book->id)}}"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                  </td>
                  <td>
                    <form action="{{route('book.delete',$book->id)}}" method="post">
                      @csrf
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                  <td>No books to display</td>
                @endforelse
                
              </tbody>
            </table>
          </div>
        </div>
        {{$books->links()}}
      </div>
    </div>
  </div>
@endsection
