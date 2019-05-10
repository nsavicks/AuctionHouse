
    <div id="contact-form">
        <?php echo form_open_multipart('Contact/SendMail'); ?>         
            <label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="Your first name..." required>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" placeholder="Your last name...">
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Your e-mail address..." required>
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Your message..." rows="10" required></textarea>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    </div