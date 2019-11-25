<div class="login">
    <div class="error"><?php if( isset($data['error']) ) { echo $data['error']; } ?></div>
    <form action="/users/login/" method="post">
        <div class="row">
            <label for="login_email">E-mail</label>
            <input type="email" name="login_email" id="login_email">
        </div>
        <div class="row">
            <label for="login_password"></label>
            <input type="password" name="login_password" id="login_password">
        </div>
        <div>
            <input type="submit" name="login_submit" id="login_submit" value="Login"> OR
            <a href="/users">Register</a>
        </div>
    </form>
</div>
