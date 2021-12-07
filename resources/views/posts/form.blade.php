<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control @error('title')
            is-invalid @enderror" placeholder="Title">
            @if($errors->has('title'))
                <span
                    class="error text-danger text-bold">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Body:</strong>
            <textarea class="form-control @error('body') 
            is-invalid @enderror" name="body" value="{{ old('body') }}" id="" rows="4" placeholder="Body">{{ $post->body }}</textarea>
        </div>
        @if($errors->has('body'))
            <span
                class="error text-danger text-bold">{{ $errors->first('body') }}</span>
        @endif
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Author</strong>
            <select name="user_id" class="form-control @error('user_id')
            is-invalid @enderror">
            <option value="">Select Author</option>
            @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
        </select>
            @if($errors->has('user_id'))
                <span
                    class="error text-danger text-bold">{{ $errors }}</span>
            @endif
        </div>
    </div>
</div>