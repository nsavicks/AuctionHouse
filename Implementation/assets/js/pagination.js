

    function loadTable(id,data){
        
        var table = document.getElementById("table-" + id);
        table.innerHTML = "";

        var columns;

        switch(id){
            case "pending":
                columns = new Array("Auction ID", "Name", "Owner", "Create Time");
            break;
            case "all":
                columns = new Array("Auction ID", "Name", "Owner", "End Time", "Highest Bid", "Status");
            break;
            case "users":
                columns = new Array("Username", "First Name", "Last Name", "Registration Date", "Title");
            break;
            case "bids":
                columns = new Array("Bid ID", "Auction ID", "Name", "End Time", "Status", "My Bid");
            break;
            case "owned":
                columns = new Array("Auction ID", "Name", "End Time", "Status", "Highest Bid");
            break;
        }

        var tr = document.createElement("tr");

        for (i = 0; i< columns.length; i++){
            var th = document.createElement("th");
            th.innerHTML = columns[i];
            tr.appendChild(th);
        }

        if (id != "bids" && id != "owned"){
            var th = document.createElement("th");
            th.setAttribute("colspan","2");
            th.innerHTML = "Command";
            tr.appendChild(th);
        }

        table.appendChild(tr);

        var start = (currentPage[id] - 1) * 5;

        for (i = start; i<Math.min(data[id].length, start + 5); i++){

            switch(id){
                case "pending":
                {
                    var tr = document.createElement("tr");
                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'SingleAuction?id=' + data[id][i].auction_id + '">' + data[id][i].auction_id + '</a>';
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].auction_name;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'UserProfile?username=' + data[id][i].auction_owner + '">' + data[id][i].auction_owner + '</a>';
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].create_time;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'Dashboard/ApproveAuction/' + data[id][i].auction_id + '"><img src="' + asset_url + 'img/checkG.png"></a> <a href="' + base_url + 'Dashboard/DenyAuction/' + data[id][i].auction_id + '"><img src="' + asset_url + 'img/blockR.png"></a></td>';
                    tr.appendChild(td);
                }
                break;

                case "all":
                {
                    var tr = document.createElement("tr");
                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'SingleAuction?id=' + data[id][i].auction_id + '">' + data[id][i].auction_id + '</a>';
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].auction_name;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'UserProfile?username=' + data[id][i].auction_owner + '">' + data[id][i].auction_owner + '</a>';
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].end_time;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].max_bid;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].auction_state;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'Dashboard/DeleteAuction/' + data[id][i].auction_id + '"><img src="' + asset_url + 'img/remove.png"></a></td>';
                    tr.appendChild(td);
                }
                break;

                case "users":
                {
                    var tr = document.createElement("tr");

                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'UserProfile?username=' + data[id][i].username + '">' + data[id][i].username + '</a>';
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].first_name;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].last_name;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].create_time;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].rank_title;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = `
                            <a href="` + base_url + `ManageAccounts/AddAdministrator/` + data[id][i].username + `"><img src="` + asset_url + `img/add-administrator.png"></a>
                            <a href="` + base_url + `ManageAccounts/AddModerator/` + data[id][i].username + `"><img src="` + asset_url + `img/add-moderator.png"></a>
                            <a href="` + base_url + `ManageAccounts/ClearPrivileges/` + data[id][i].username + `"><img src="` + asset_url + `img/clear-privileges.png"></a>
                            <a href="` + base_url + `ManageAccounts/BanUser/` + data[id][i].username + `"><img src="` + asset_url + `img/blockR.png"></a>
                    `;
                    tr.appendChild(td);
                }
                break;
                
                case "bids":
                {
                    var tr = document.createElement("tr");

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].bid_id;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'SingleAuction?id=' + data[id][i].auction_id + '">' + data[id][i].auction_id + '</a>';
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].auction_name;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].end_time;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].auction_state;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].bid_value;
                    tr.appendChild(td);

                }
                break;
                
                case "owned":
                {

                    var tr = document.createElement("tr");

                    var td = document.createElement("td");
                    td.innerHTML = '<a href="' + base_url + 'SingleAuction?id=' + data[id][i].auction_id + '">' + data[id][i].auction_id + '</a>';
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].auction_name;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].end_time;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].auction_state;
                    tr.appendChild(td);

                    var td = document.createElement("td");
                    td.innerHTML = data[id][i].max_bid;
                    tr.appendChild(td);

                }
                break;
            }
            // END OF SWITCH

            table.appendChild(tr);
        }

        if (currentPage[id] == 1) document.getElementById("prev-" + id).disabled = true;
            else document.getElementById("prev-" + id).disabled = false;
        if (currentPage[id] == numberOfPages[id]) document.getElementById("next-" + id).disabled = true;
            else document.getElementById("next-" + id).disabled = false;
    }

    function nextPage(id){

        if (currentPage[id] == numberOfPages[id]) return;

        currentPage[id]++;

        loadTable(id, globalData);

    }

    function previousPage(id){

        if (currentPage[id] == 1) return;

        currentPage[id]--;

        loadTable(id, globalData);

    }

    function search(id){
        
        var text = document.getElementsByName("search-"+id)[0].value;

        var newData = new Array();
        newData[id] = new Array();

        var regex = new RegExp(".*" + text.toUpperCase() + ".*");

        for (var i = 0; i < globalData[id].length; i++){

            if (id == "pending" || id == "all" || id == "owned" || id == "bids"){

                if (regex.test(globalData[id][i].auction_id.toUpperCase()) || regex.test(globalData[id][i].auction_name.toUpperCase())){
                    newData[id].push(globalData[id][i]);
                }

            }
            else{

                if (regex.test(globalData[id][i].username.toUpperCase()) || regex.test(globalData[id][i].first_name.toUpperCase())){
                    newData[id].push(globalData[id][i]);
                }

            }
            
        }

        currentPage[id] = 1;
        numberOfPages[id] = Math.ceil(newData[id].length / 5);

        loadTable(id, newData);

    }

