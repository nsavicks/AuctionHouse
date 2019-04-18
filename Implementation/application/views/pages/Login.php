<div id="login-box">
    <div id="login-form">
        <?php echo form_open('Login/Submit'); ?>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Your username..." required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Your password..." required>
            <input type="submit" name="login" value="Log in">
        </form>
    </div>
</div>
