@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1 class="todo-text">Banners</h1>
        </div>
        <div class="col-lg-12">
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- without csrf the form won't be work because the all requests are not take from backend (for security purpose)--}}
                <div class="row">
                    <div class=""></div>
                    <div class="col-lg-8">
                        <input name="title" class="form-control form-control-lg" type="text" placeholder="aBanner Title" aria-label=".form-control-lg example">
                    </div>
                    <div class="mt-2 col-lg-8">
                        <input name="image" class="form-control form-control-lg" type="file" placeholder="Enter banner image" aria-label=".form-control-lg example"
                            accept="image/jpg, image/jpeg, image/png"
                            ref="fileInput">
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="form-control-lg btn btn-primary" >Submit</button>
                    </div>
                </div>
            </form>
        </div>    
        
        <div class="">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $key => $banner)
                      <tr>
                        <td scope="row">{{ $key++ }}</td>
                        <td>{{ $banner->title }}</td>

                        <td>
                            @if ($banner->sdone == 0)
                                <span class="badge bg-danger">not completed</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            
                            @endif
                        </td>
                        <td>
                            <img src="{{ $banner->url }}" alt="Image Fail" width="80px" height="50px">
                        </td>
                        <td>
                            <a href="{{ route('banner.delete',$banner->id) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('banner.status',$banner->id) }}" class="btn btn-success">done</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection

@push('css')
<style>
    .todo-text{
        padding-top: 10vh;
        color: rgb(134, 175, 19);
    }
</style>
@endpush