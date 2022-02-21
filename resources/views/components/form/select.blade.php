@props(['name','values'])

<label for={{$name}}><b>Driver Name</b></label>
<select name={{$name}} id={{$name}}>
    <option value="">Select a Driver</option>
    @foreach($values as $value)
        <option value="{{$value->name}}">{{$value->name}}</option>
    @endforeach
</select>
