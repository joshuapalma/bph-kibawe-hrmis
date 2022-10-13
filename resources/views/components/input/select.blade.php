
@if (isset($attributes))
<div class="form-group">
    @isset($label)
        <label>
            @lang($label)
            @isset($spinner_id)
                <div class="spinner-border text-warning" id="{{ $spinner_id }}" role="status" style="display: none; width: 15px; height: 15px; ">
                    <span class="sr-only">Loading...</span>
                </div>
            @endisset
        </label>
    @endisset
    <select 
        @foreach ($attributes as $key => $attr)
            {{$key}}="{{$attr}}"
        @endforeach
    >
        @isset($attributes['placeholder'])
            <option value="">@lang($attributes['placeholder'])</option>
        @endisset
        
        @foreach ($options as $key => $item)
            <option value="{{ $key }}" {{$key === $attributes['value'] ? 'selected' : '' }}>{{ $item }}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first($attributes['name']) }}</span>
</div>
@else
<div class="form-group">
    <label>
        @lang($label)
        @isset($spinner_id)
            <div class="spinner-border text-warning" id="{{ $spinner_id }}" role="status" style="display: none; width: 15px; height: 15px; ">
                <span class="sr-only">Loading...</span>
            </div>
        @endisset

    </label>
    <select 
        @isset($onchange)
            onchange="{{$onchange}}"
        @endisset
        name="{{$name}}" 
        id="{{$input_id}}"
    >
        <option value="">@lang($placeholder)</option>
        @foreach ($items as $key => $item)
            <option value="{{ $key }}" {{$key === $value ? 'selected' : '' }}>{{ $item }}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first($name) }}</span>
</div>
@endif
