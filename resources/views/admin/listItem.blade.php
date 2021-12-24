@extends('layouts.admin')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="#">×</a>
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            <a class="close" data-dismiss="alert" href="#">×</a>
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="pl-4 mb-4 mt-5">
        <h2>List Item</h2>
                <div class="card-body">
                    <label for="name">Seach</label>
                    {{ Form::select('search', [0=>'All',1=>'Food',2=>'Drink',3=>'Unprocessed food'],isset($search) ? $search : 0, ['class' => 'form-control','data-token'=> csrf_token() ,'onchange'=>"searchItem(this)"]) }}
                </div>
        <a class="btn btn-outline-info" href="#" name="openModal" data-toggle="modal" data-target="#form-modal">New
            item</a>
        <form action="{{ route('admin.postNewItem') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">New Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" required id="name"
                                       placeholder="Enter item name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" required id="price"
                                       placeholder="Enter price name">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                {{ Form::select('type', [0=>'All',1=>'Food',2=>'Drink',3=>'Unprocessed food'],0, ['class' => 'form-control']) }}

                            </div>
                            <div class="form-group">
                                <label for="description">Note</label>
                                <textarea rows="4" class="form-control" name="description" id="description"
                                          placeholder="Enter your note"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="imgInp">Upload Image</label>
                                <input accept="image/*" name="image" type='file' id="imgInp" required/>
                                <div class="border image-upload" style="min-height: 150px">
                                    <img id="blah" src="{{asset('\images\defaul.PNG') }}" alt="" class="image-upload"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card mb-4 mt-5">
        <div class="card-body">
            <!--Table-->
            <table class="table table-hover">
                <!--Table head-->
                <thead class="mdb-color darken-3">
                <tr class="">
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                @foreach($items as $key => $item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><a><img src="{{ $item->image }}" class="img-thumbnail" width="50px" height="50px"></a></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td class="pr-0 text-right"><a class="btn btn-outline-danger"
                               href="{{ route('admin.detailItem',['id' => $item->id]) }}"><i
                                    class="fas fa-eye"></i></a>
                            <a class="btn btn-outline-danger"
                               href="{{ route('admin.deleteItem',['id' => $item->id]) }}"><i
                                    class="fas fa-trash-alt"></i>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->
        </div>
    </div>
@endsection
