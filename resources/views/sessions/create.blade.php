<x-layout>
    <div class="container">
    <h1>Login!</h1>
        <form method="POST" action="/login">
            @csrf
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" value="{{old('username')}}" >
                <x-form.error name="username"/>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" >
            <x-form.error name="password"/>

            <button class="btn" type="submit">Login</button>

        </form>
    </div>
</x-layout>
