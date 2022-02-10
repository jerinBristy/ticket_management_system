<x-layout>
    <div class="container">
        <h1>Create an account!</h1>
        <form method="POST" action="/register">
            @csrf
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" value="{{old('username')}}">
            <x-form.error name="username"/>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter email" name="email" value="{{old('email')}}">
            <x-form.error name="email"/>

            <label for="counterName"><b>Counter Name</b></label>
            <input type="text" placeholder="Enter Counter Name" name="counterName" value="{{old('counterName')}}">
            <x-form.error name="counterName"/>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" value="{{old('password')}}">
            <x-form.error name="password"/>

            <button class="btn" type="submit">Register</button>

        </form>
    </div>
</x-layout>
