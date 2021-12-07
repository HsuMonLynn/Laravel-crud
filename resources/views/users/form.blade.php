<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="form-control @error('name')
        is-invalid @enderror"
                placeholder="Name">
            @if ($errors->has('name'))
                <span class="error text-danger text-bold">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="form-control @error('email')
      is-invalid @enderror"
                placeholder="Email">
        </div>
        @if ($errors->has('email'))
            <span class="error text-danger text-bold">{{ $errors->first('email') }}</span>
        @endif
    </div>
</div>