$(document).ready(function() {
    // function to display table of blood banks
    function loadTable() {
        $("#table-blood-banks").load("api/bank-page/display-blood-banks.php");
    }
    loadTable();

    // clear the add form every after submission
    function clearAddForm() {
        $("#txt-bankname").val("");
        $("#txt-barangay").val("");
        $("#txt-city").val("");
        $("#txt-province").val("");
        $("#txt-phoneno").val("");
    }

    // clear the edit form every after submission
    function clearEditForm() {
        $("#txt-ebankname").val("");
        $("#txt-ebarangay").val("");
        $("#txt-ecity").val("");
        $("#txt-eprovince").val("");
        $("#txt-ephoneno").val("");
    }

    // submit donation details
    $("#submit-bank").on("click", function() {
        const bn = $("#txt-bankname").val();
        const brgy = $("#txt-barangay").val();
        const cty = $("#txt-city").val();
        const prov = $("#txt-province").val();
        const no = $("#txt-phoneno").val();
        
        if(bn === "" || brgy === "" || cty === "" || prov === "" || no === "") {
            alert("Please fill in all require fields (*)")
            return;
        }

        $.post("api/bank-page/add-bank.php", 
        {
            bn, brgy, cty, prov, no
        },
        function(data, status){
            alert(data);
            if(status == "success") clearAddForm();
            loadTable();
        });
    })

    $('table').on("click", ".btn-delete", function(e) {
        var isSure = confirm("Are you sure you want to delete this record?");
        const id = e.target.id.split("-")[1];

        if(isSure) {
            $.post("api/bank-page/delete-bank.php", 
            {
                id
            },
            function(data, status) {
                alert(data);
                loadTable();
            });
        }
    });

    $('table').on("click", ".btn-edit", function(e) {
        const id = e.target.id.split("-")[1];

        displayFreshDetailsModal(id);
    });

    var edit_id = 0;
    // get data from API and load in details form
    function displayFreshDetailsModal(id) {
        
        $.post("api/bank-page/display-bank-details.php", 
        {
            id
        },
        function(data, status){
            const response = JSON.parse(data);
            const { 
                id, bn, brgy, cty, prov, no 
            } = response.data[0];

            $("#title-id").text(id);
            edit_id = id;

            $("#txt-ebankname").val(bn);
            $("#txt-ebarangay").val(brgy);
            $("#txt-ecity").val(cty);
            $("#txt-eprovince").val(prov);
            $("#txt-ephoneno").val(no);
            
        });
    }

    // update bank details
    $("#btn-update").on("click", function() {
        const bn = $("#txt-ebankname").val();
        const brgy = $("#txt-ebarangay").val();
        const cty = $("#txt-ecity").val();
        const prov = $("#txt-eprovince").val();
        const no = $("#txt-ephoneno").val();
        
        if(edit_id === 0 || bn === "" || brgy === "" || cty === "" || prov === "" || no === "") {
            alert("Please fill in all require fields (*)")
            return;
        }

        $.post("api/bank-page/update-bank.php", 
        {
            id: edit_id, bn, brgy, cty, prov, no
        },
        function(data, status){
            alert(data);
            if(status == "success") {
                clearEditForm();
                $("#btn-close").click();
            };
            loadTable();
        });
    })

});
