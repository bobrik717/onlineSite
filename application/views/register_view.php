<div id="register_div">
    <form id="register_form" name="register_form" action="/users/register" method="post">
        <div class="row">
            <label for="register_email">E-mail</label>
            <input name="register_email" id="register_email" type="email" >
            <div class="error"><?php if(isset($data['errors']['email'])) { echo $data['errors']['email']; } ?></div>
        </div>
        <div class="row">
            <label for="register_password">Password</label>
            <input name="register_password" id="register_password" type="password" >
            <div class="error"><?php if(isset($data['errors']['pass'])) { echo $data['errors']['pass']; } ?></div>
        </div>
        <div class="row">
            <label for="register_confpassword">Confirm password</label>
            <input name="register_confpassword" id="register_confpassword" type="password" >
            <div class="error"><?php if(isset($data['errors']['confpass'])) { echo $data['errors']['confpass']; } ?></div>
        </div>
        <div class="row">
            <input type="submit" id="register_submit" value="Continue">
        </div>
        <div class="error"><?php if( isset($data['errors']['dbError']) ) { echo $data['errors']['dbError']; } ?></div>
    </form>
</div>
