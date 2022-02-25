<x-layout>
    <div class="container">
        <x-form.select name="from" :values="$routes" columnName="from" classname="from"/>

        <label for=to><b>to</b></label>
        <select name=to id=to class="to">
            <option value="">Select to</option>


            
{{--            @foreach($values as $value)--}}
{{--                <option value="{{$value->$columnName}}">{{$value->$columnName}}</option>--}}
{{--            @endforeach--}}
        </select>

    </div>
</x-layout>
