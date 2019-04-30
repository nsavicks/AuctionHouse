<div class="page-content">

    <div id="my-bids">
        <div class="auctions-preview-title">
            <div class="auctions-preview-title-left">
                <img src="<?php echo asset_url() . 'img/hand.png' ?>">
                <h1>My Bids</h1>
            </div>
            <div class="auctions-preview-title-right">
            </div>
        </div>

        <div class="search-pagination">
            <div class="search-bar">
                <input type="search" name="search-bids" onkeyup="search('bids')" placeholder="Insert Auction ID or Name">
            </div>
            <div class="pagination">
              <button id="prev-bids" onclick = "previousPage('bids')">❮</button>
              <button id="next-bids" onclick="nextPage('bids')">❯</button>
            </div>
        </div>

        <table id="table-bids">

        </table>
    </div>

    <div id="owned-auctions">
        <div class="auctions-preview-title">
            <div class="auctions-preview-title-left">
                <img src="<?php echo asset_url() . 'img/list.png' ?>">
                <h1>Owned Auctions</h1>
            </div>
            <div class="auctions-preview-title-right">
            </div>
        </div>

        <div class="search-pagination">
            <div class="search-bar">
                <input type="search" name="search-owned" onkeyup="search('owned')" placeholder="Insert Auction ID or Name">
            </div>
            <div class="pagination">
              <button id="prev-owned" onclick = "previousPage('owned')">❮</button>
              <button id="next-owned" onclick="nextPage('owned')">❯</button>
            </div>
        </div>

        <table id="table-owned">

        </table>
    </div>
</div>

<script>

    var globalData = new Array();

    globalData["bids"] = <?php echo json_encode($bids); ?>;
    globalData["owned"] = <?php echo json_encode($owned); ?>;

    var currentPage = new Array();
    currentPage["bids"] = 1;
    currentPage["owned"] = 1;

    var numberOfPages = new Array();
    numberOfPages["bids"] = Math.ceil(globalData["bids"].length / 5);
    numberOfPages["owned"] = Math.ceil(globalData["owned"].length / 5);

    var base_url = '<?php echo base_url(); ?>';
    var asset_url = '<?php echo asset_url(); ?>';

   

</script>

<script src="<?php echo asset_url() . 'js/pagination.js' ?>"></script>

<script>
    loadTable("bids", globalData);
    loadTable("owned", globalData);   
</script>