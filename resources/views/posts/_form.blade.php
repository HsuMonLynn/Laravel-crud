<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title')
            is-invalid @enderror" placeholder="Title">
            @if($errors->has('title'))
                <span class="error text-danger text-bold">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Body:</strong>
            <textarea class="form-control @error('body') 
            is-invalid @enderror" name="body" value="{{ old('body') }}" id="" rows="4"
                placeholder="Body">{{ $post->body }}</textarea>
        </div>
        @if($errors->has('body'))
            <span class="error text-danger text-bold">{{ $errors->first('body') }}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Author</strong>
            <select name="user_id" class="form-control @error('user_id')
            is-invalid @enderror">
                <option>Select Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ $author->id === $post->user_id ? 'selected' : '' }}>
                        {{ $author->name }}</option>
                @endforeach
            </select>
            @if($errors->has('user_id'))
                <span class="error text-danger text-bold">{{ $errors }}</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Categories</strong>
            <select name="categories_id[]" class="form-control @error('categories_id[]')
            is-invalid @enderror" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                    @if($postCategories->contains($category->id))
                    selected
                    @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @if($errors->has('user_id'))
                <span class="error text-danger text-bold">{{ $errors }}</span>
            @endif
        </div>
    </div>
    <div class="row col-12 pt-3 pb-3">
        <div class="col-md-4">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
        </div>
        <div class="col-md-4 ml-auto">
            <div class="row justify-content-end">
                <button type="submit" class="btn btn-primary">{{$submitBtn}}</button>
            </div>
        </div>
    </div>
</div>
