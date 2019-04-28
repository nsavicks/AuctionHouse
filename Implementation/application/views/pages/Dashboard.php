<div class="page-content">
    <div id="pending-auctions">
        <div class="auctions-preview-title">
            <div class="auctions-preview-title-left">
                <img src="<?php echo asset_url() . 'img/pending.png'; ?>">
                <h1>Pending Auctions</h1>
            </div>
            <div class="auctions-preview-title-right">
            </div>
        </div>

        <div class="search-pagination">
            <div class="search-bar">
                <input type="search" name="search-pending" onkeyup="search('pending')" placeholder="Insert Auction ID or Name...">
            </div>

            <div class="pagination">
              <button id="prev-pending" onclick = "previousPage('pending')">❮</button>
              <button id="next-pending" onclick="nextPage('pending')">❯</button>
            </div>
        </div>

        <table id="table-pending">
        </table>
    </div>

    <div id="all-auctions">
        <div class="auctions-preview-title">
            <div class="auctions-preview-title-left">
                <img src="<?php echo asset_url() . 'img/list.png'; ?>">
                <h1>All Auctions</h1>
            </div>
            <div class="auctions-preview-title-right">
            </div>
        </div>

        <div class="search-pagination">
            <div class="search-bar">
                <input type="search" name="search-all" onkeyup="search('all')" placeholder="Insert Auction ID or Name...">
            </div>

            <div class="pagination">
              <button id="prev-all" onclick = "previousPage('all')">❮</button>
              <button id="next-all" onclick="nextPage('all')">❯</button>
            </div>
        </div>

        <table id="table-all">
        </table>


    </div>

</div>

<script>

    var globalData = new Array();

    globalData["pending"] = <?php echo json_encode($pending); ?>;
    globalData["all"] = <?php echo json_encode($all); ?>;

    var currentPage = new Array();
    currentPage["pending"] = 1;
    currentPage["all"] = 1;

    var numberOfPages = new Array();
    numberOfPages["pending"] = Math.ceil(globalData["pending"].length / 5);
    numberOfPages["all"] = Math.ceil(globalData["all"].length / 5);

    var base_url = '<?php echo base_url(); ?>';
    var asset_url = '<?php echo asset_url(); ?>';

   

</script>

<script src="<?php echo asset_url() . 'js/pagination.js' ?>"></script>

<script>
    loadTable("pending", globalData);
    loadTable("all", globalData);   
</script>
