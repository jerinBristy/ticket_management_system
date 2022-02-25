@props(['name','values','columnName','classname'])

<label for={{$name}}><b>{{$name}}</b></label>
<select name={{$name}} id={{$name}} class="{{$classname ?? ''}}">
    <option value="">Select {{$name}}</option>
    @foreach($values as $value)
        <option value="{{$value->$columnName}}">{{$value->$columnName}}</option>
    @endforeach
</select>
