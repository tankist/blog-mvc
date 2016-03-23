<div class="container">
    <div class="row">
        <form action="{{ url.get(['for': 'signInPost']) }}">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <button class="btn btn-default">Sign In</button>
        </form>
    </div>
</div>