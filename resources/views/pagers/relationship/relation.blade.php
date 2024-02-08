@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1 class="todo-text">Relationship</h1>
            {{-- get the category that products belongs too  --}}
            {{-- <div class="row col-12 lg">
                @foreach ($Products as $product)
                    <div class="card m-2" style="width: 18rem;" >
                        <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->intro }}</h6>
                        </div>

                        <div class="card">
                            <div class="">
                                <h6>{{ $product->category->name }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}

            {{-- get the products that belongs to the paticular category --}}
            <div class="row col-12 lg">
                @foreach ($categories as $category)
                    <div class="card m-2" style="width: 18rem;" >
                        <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                        @foreach ($category->products as $product)
                            <div class="card">
                                <div class="">
                                    <h6>{{ $product->name }}</h6>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

