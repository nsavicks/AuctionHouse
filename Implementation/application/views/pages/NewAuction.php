<div id="new-auction">
    <?php echo form_open_multipart('NewAuction/Submit'); ?>
        <label for="auction-pictures">Auction Pictures</label>
        <input type="file" name="auction-pictures[]" accept=".png,.jpg,.gif" multiple>

        <label for="auction-name">Auction Name</label>
        <input type="text" name="auction-name" placeholder="Your auction name..." required>

        <label for="category">Category</label>
        <select name="category" required>
            <?php
                foreach($categories as $category){
                    echo '<option>' . $category->category_name . '</option>';
                }
            ?>
        </select>

        <label for="duration">Duration</label>
        <input type="number" name="duration" min="1" max="30" value="1" required> day(s)

        <label for="start-price">Starting Price</label>
        <input type="number" name="start-price" value="0" required> rsd.

        <label for="item-condition">Item Condition</label>
        <select name="item-condition" required>
            <option>New</option>
            <option>Used</option>
            <option>Broken</option>
        </select>

        <label for="auction-description">Auction Description</label>
        <textarea name="auction-description" placeholder="Your auction description..." rows="10"></textarea>
    
        <input type="submit" name="create-auction" value="Create Auction">
    </form>
</div>