@extends('master.homeAdmin')
@section('noidung')

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        <legend>Thêm mới sản phẩm</legend>
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error('name')
                        <small class="help block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea class="form-control" id="content" name="desr" placeholder="Mô tả">{{ old('desr') }}</textarea>
                    @error('desr')
                        <small class="help block">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <select name="category_id" id="categories_id" class="form-control" required="required">
                        <option value=""></option>
                        @foreach ($cat as $cats)
                            <option value=" {{ $cats->id }}" {{ old('category_id') == $cats->id ? 'selected' : '' }}>
                                {{ $cats->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="help block">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">tag sản phẩm</label>
                    <select name="tag[]" class="form-control" required="required" multiple>
                        @foreach ($tags as $tag)
                            <option value=" {{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                    @error('price')
                        <small class=" help block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" class="form-control" name="code">
                    @error('code')
                        <small class=" help block">{{ $message }}</small>
                    @enderror
                </div>
                <div class=" form-group">
                    <label for="">Ảnh</label>
                    <input type="file" class="form-control" name="image" placeholder="Input field" id="">

                    @error('image')
                        <small class="help block">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Thêm mới</button>
            </div>
        </div>

    </form>

@stop
