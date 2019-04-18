
<div id="register-box">

        <?php echo form_open_multipart('Register/Submit'); ?>

        <label for="ppicture">Profile picture</label>
        <input type="file" name="ppicture" accept=".png,.jpg">

        <label for="fname">First Name</label>
        <input type="text" name="fname" placeholder="Your first name..." required>

        <label for="lname">Last Name</label>
        <input type="text" name="lname" placeholder="Your last name..." required>

        <label for="birthdate">Date of birth</label>
        <input type="date" name="birthdate" placeholder="Your date of birth..." required>

        <label for="gender">Gender</label>
        <div id="radio-group">
            <input type="radio" name="gender" value="Male" checked>Male
            <input type="radio" name="gender" value="Female">Female
        </div>

        <label for="state">State</label>
        <select name="state">
            <option value="serbia">Serbia</option>
            <option value="montenegro">Montenegro</option>
            <option value="bih">Bosnia and Herzergovina</option>
            <option value="croatia">Croatia</option>
            <option value="other">Other</option>
        </select>

        <label for="telephone">Telephone</label>
        <input type="tel" name="telephone" placeholder="Your telephone number...">

        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Your e-mail address..." required>

        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Your username..." required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Your password..." required>

        <input type="checkbox" name="accept" value="I agree to terms and conditions of AuctionHouse" required>I
        agree to terms and conditions of AuctionHouse

        <input type="submit" name="Register" value="Register">
    </form>
</div>