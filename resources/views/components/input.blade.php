@if ($label)
    <label class="label" for="{{$name}}">{{$label}}</label>
@endif
<input  name="{{$name}}" id="{{$name}}" class="form-input" type="{{$type}}" placeholder="{{$placeholder ? $placeholder : ''}}">
