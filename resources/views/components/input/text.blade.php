<div class="form-group">
    @isset($label)
        <label>@lang($label)</label>
    @endisset
    <input 
        @foreach ($attributes as $key => $attr)
            {{$key}}="{{$attr}}"
        @endforeach
    >
    <span class="text-danger">{{ $errors->first($attributes['name']) }}</span>
</div>