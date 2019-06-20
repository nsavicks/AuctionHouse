<div class="page-content">

    <div id="all-users">
        <div class="auctions-preview-title">
            <div class="auctions-preview-title-left">
                <img src="<?php echo asset_url() . 'img/people.png' ?>">
                <h1>All Users</h1>
            </div>
            <div class="auctions-preview-title-right">
            </div>
        </div>

        <div class="search-pagination">
            <div class="search-bar">
                <input type="search" name="search-users" onkeyup="search('users')" placeholder="Insert Username or First Name...">
            </div>
            <div class="pagination">
              <button id="prev-users" onclick = "previousPage('users')">❮</button>
              <button id="next-users" onclick="nextPage('users')">❯</button>
            </div>
        </div>

        <table id="table-users">

        </table>
    </div>
</div>


<script>

    var xhttp = new XMLHttpRequest();

    xhttp.open("GET", "AjaxAPI/getAllUsers", false);
    xhttp.send();

    var globalData = new Array();

    globalData["users"] = JSON.parse(xhttp.responseText);

    var currentPage = new Array();
    currentPage["users"] = 1;

    var numberOfPages = new Array();
    numberOfPages["users"] = Math.ceil(globalData["users"].length / 5);

    var base_url = '<?php echo base_url(); ?>';
    var asset_url = '<?php echo asset_url(); ?>';

   

</script>

<script src="<?php echo asset_url() . 'js/pagination.js' ?>"></script>

<script>
    loadTable("users", globalData);   
</script>