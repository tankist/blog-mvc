<div class="container">
    <div class="row">
        <form action="{{ url.get(['for': 'signUpPost']) }}">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <button class="btn btn-default">Sign Up</button>
        </form>
    </div>
</div>