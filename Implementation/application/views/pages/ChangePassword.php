<div id="login-box">
    <div id="login-form">
        <?php echo form_open('ChangePassword/Confirm'); ?>
            <label for="password">Old password</label>
            <input type="password" name="oldpassword" placeholder="Your old password..." required>
            <label for="password">New password</label>
            <input type="password" name="newpassword" placeholder="Your new password..." required>
            <label for="password">Repeat new password</label>
            <input type="password" name="repeatpassword" placeholder="Repeat password..." required>
            <input type="submit" name="confirm" value="Confirm">
        </form>
    </div>
</div>
