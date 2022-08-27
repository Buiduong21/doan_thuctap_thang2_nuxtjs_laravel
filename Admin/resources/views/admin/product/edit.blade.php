@extends('master.homeAdmin')
@section('noidung')

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        <legend>Sửa sản phẩm</legend>
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Input field"
                        value="{{ $product->name }}">
                    @error('name')
                        <small class=" help block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" id="desr" name="desr" placeholder="Mô tả">{{ $product->desr }}</textarea>
                    @error('desr')
                        <small class="help block">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>

                        <div class="form-group">
                            <label for="">danh mục bài viết</label>
                            <select class="form-control" name="category_id">
                                <option selected disabled>-- chọn Danh Mục --</option>
                                @foreach ($categories as $category)
                                    <option
                                        {{ $product->category_id == $category->id ? ' selected ' : '' }}value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="help block">{{ $message }}</small>
                            @enderror
                        </div>
                        @error('category_id')
                            <small class="help block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="price" placeholder="Input field"
                            value="{{ $product->price }}">
                        @error('price')
                            <small class=" help block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tag bài viết:</strong></br>
                            <select class="form-control" name="tag[]" multiple>
                                @foreach ($tags as $tag)
                                    <option
                                        @foreach ($product->tags as $item) {{ $item->pivot->id_tag == $tag->id ? 'selected' : '' }} @endforeach
                                        value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" class="form-control" name="code" placeholder="Input field"
                            value="{{ $product->code }}">
                        @error('price')
                            <small class=" help block">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tải ảnh</label>
                        <input type="file" class="form-control" name="image">
                        <div>
                            <img class="image" src="{{ asset($product->image) }}" width="200px" alt="">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Thêm mới</button>
                </div>
            </div>
    </form>

@stop()
