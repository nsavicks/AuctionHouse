
<script>
    
    function OnSelectionChange(){
        var category=document.formaShop.category.value;
        if(category=="All Categories")
            window.location.href="Shop";
        else
        window.location.href="Shop?category="+category;
        
    }
</script>
     <div id="shop-content">
        <div class="item-filter">
            
            <form name="formaShop" >
    <select name="category" onchange="OnSelectionChange()">
        
        <option value="All Categories" >All Categories</option>
          <?php        foreach($categories as $category){
                  if($selected!=$category->category_name)
                    echo '<option value="'.$category->category_name.'">' . $category->category_name . '</option>';
                  else
                       echo '<option selected="selected" value="'.$category->category_name.'">' . $category->category_name . '</option>';
                }?>
    </select>
</form>
    </div>
         <?php    
              foreach($AllAuctions as $auction){
        $this->load->view("include/auction-preview.inc.php",["auction"=>$auction]);
            
        }
        ?>
       
            
       </div>
   
