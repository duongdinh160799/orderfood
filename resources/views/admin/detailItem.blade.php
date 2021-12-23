@extends('layouts.admin')
@section('content')
    <div class="pl-4 mb-4 mt-5">
        <h2>List Item</h2>
{{--        <div class="card-body">--}}
{{--            <label for="name">Seach</label>--}}
{{--            {{ Form::select('search', [4=>'All',0=>'Wait for admin confirm',1=>'Doing and shipping',2=>'Done',3=>'Cancel'],isset($search) ? $search : 4, ['class' => 'form-control','data-token'=> csrf_token() ,'onchange'=>"searchOrder(this)"]) }}--}}
{{--        </div>--}}
        <form action="{{ route('admin.postDetailItem') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{ $item->id }}" hidden>
            <div class="modal-body text-left">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" required id="name" placeholder="Enter item name" value="{{ $item->name }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" required id="price" placeholder="Enter price name" value="{{ $item->price }}">
                </div>
                <div class="form-group">
                    <label for="description">Note</label>
                    <textarea rows="4" class="form-control" name="description" id="description" placeholder="Enter your note">{{ $item->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="imgInp">Upload Image</label>
                    <input accept="image/*" name="image" type='file' id="imgInp" />
                    <div class="border image-upload" style="min-height: 150px">
                        <img id="blah" src="{{ $item->image ? $item->image : asset('\images\defaul.PNG') }}" alt="" class="image-upload"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
