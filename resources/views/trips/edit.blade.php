<x-layout>
    <div class="container">
        <x-form.select name="from" :values="$routes" columnName="from" classname="from"/>

        <label for=to><b>to</b></label>
        <select name=to id=to class="to">
            <option value="">Select to</option>
        </select>

        <div class="output">

        </div>

    </div>
</x-layout>
