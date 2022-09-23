$(document).ready(function() {
    // function to display table of blood donations
    function loadTable() {
        $("#table-blood-donations").load("api/display-blood-donations.php");
    }
    loadTable();

    // clear the add form every after submission
    function clearAddForm() {
        $("#txt-bloodgroup").val("A+");
        $("#txt-dod").val("");
        $("#txt-lastname").val("");
        $("#txt-firstname").val("");
        $("#txt-midname").val("");
        $("#txt-sex").val("Male");
        $("#txt-dob").val("");
        $("#txt-barangay").val("");
        $("#txt-city").val("");
        $("#txt-province").val("");
        $("#txt-mobile").val("");
        $("#txt-email").val("");
    }

    // display blood bank names from db to modal form selection
    $("#txt-bankname").load("api/getBankNamesToForm.php");
    $("#txt-ebankname").load("api/getBankNamesToForm.php");

    // submit donation details
    $("#submit-donation").on("click", function() {
        const bn = $("#txt-bankname").val();
        const bg = $("#txt-bloodgroup").val();
        const dod = $("#txt-dod").val();
        const ln = $("#txt-lastname").val();
        const fn = $("#txt-firstname").val();
        const mn = $("#txt-midname").val();
        const sex = $("#txt-sex").val();
        const dob = $("#txt-dob").val();
        const brgy = $("#txt-barangay").val();
        const cty = $("#txt-city").val();
        const prov = $("#txt-province").val();
        const mob = $("#txt-mobile").val();
        const eml = $("#txt-email").val();
        
        if(dod === "" || ln === "" || fn === "" || dob === "" || 
            brgy === "" || cty === "" || prov === "" || mob === "" || eml === "") {
            alert("Please fill in all require fields (*)")
            return;
        }

        $.post("api/add-donation.php", 
        {
            bn, bg, dod, ln, fn, mn, sex, dob, brgy, cty, prov, mob, eml
        },
        function(data, status){
            alert(data);
            if(status == "success") clearAddForm();
            loadTable();
        });
    })

    var edit_id = 0;

    // update donation details
    $("#btn-update").on("click", function() {
        const bn = $("#txt-ebankname").val();
        const bg = $("#txt-ebloodgroup").val();
        const dod = $("#txt-edod").val();
        const ln = $("#txt-elastname").val();
        const fn = $("#txt-efirstname").val();
        const mn = $("#txt-emidname").val();
        const sex = $("#txt-esex").val();
        const dob = $("#txt-edob").val();
        const brgy = $("#txt-ebarangay").val();
        const cty = $("#txt-ecity").val();
        const prov = $("#txt-eprovince").val();
        const mob = $("#txt-emobile").val();
        const eml = $("#txt-eemail").val();
        
        if(dod === "" || ln === "" || fn === "" || dob === "" || 
            brgy === "" || cty === "" || prov === "" || mob === "" || eml === "") {
            alert("Please fill in all require fields (*)")
            return;
        }

        $.post("api/update-donation.php", 
        {
            id: edit_id, bn, bg, dod, ln, fn, mn, sex, dob, brgy, cty, prov, mob, eml
        },
        function(data, status){
            alert(data);
            if(status == "success") {
                displayFreshDetailsModal(edit_id);
                toggleEdit(true);
            };
            loadTable();
        });
    })

    $('#btn-delete').on("click", function() {
        var isSure = confirm("Are you sure you want to delete this record?");

        if(isSure) {
            $.post("api/delete-donation.php", 
            {
                id: edit_id
            },
            function(data, status) {
                alert(data);
                loadTable();
                $("#btn-modal-close").click();
            });
        }
    });

    // populate form with donation details when clicking a row
    $("#table-blood-donations").on("click", "tr", function (e) {
        edit_id = e.target.parentNode.id.split("-")[1];
        
        displayFreshDetailsModal(edit_id);
    });

    // get data from API and load in details form
    function displayFreshDetailsModal(id) {
        
        $.post("api/display-don-details.php", 
        {
            id
        },
        function(data, status){
            const response = JSON.parse(data);
            const { 
                id, bn, bg, dod, ln, fn, mn, sex, 
                dob, brgy, cty, prov, mob, eml 
            } = response.data[0];

            $("#title-id").text(id);

            $("#txt-ebankname option[value='"+bn+"']").attr("selected", "selected");
            $("#txt-ebloodgroup").val(bg);
            $("#txt-edod").val(dod);
            $("#txt-elastname").val(ln);
            $("#txt-efirstname").val(fn);
            $("#txt-emidname").val(mn);
            $("#txt-esex").val(sex);
            $("#txt-edob").val(dob);
            $("#txt-ebarangay").val(brgy);
            $("#txt-ecity").val(cty);
            $("#txt-eprovince").val(prov);
            $("#txt-emobile").val(mob);
            $("#txt-eemail").val(eml);
            
        });
    }

    $("#btn-edit-details").on("click", function() {
        toggleEdit(false);
    })

    $("#btn-cancel-edit").on("click", function() {
        toggleEdit(true);
        $("#txt-ebankname option").removeAttr("selected");
        displayFreshDetailsModal(edit_id);
    })

    $("#btn-modal-close").click(function() {
        toggleEdit(true);
        $("#txt-ebankname option").removeAttr("selected");
    })

    $("#btn-modalx").click(function() {
        $("#btn-modal-close").click();
    })

    // toggler for the disabling of form inputs
    function toggleEdit(isActive) {
        $("#form-edit input").attr("disabled", isActive);
        $("#form-edit select").attr("disabled", isActive);

        if(isActive) {
            $("#btn-cancel-edit").css("display", "none");
            $("#btn-update").css("display", "none");
            $("#btn-delete").css("display", "inline-block");
            $("#btn-edit-details").css("display", "inline-block");
        } else {
            $("#btn-edit-details").css("display", "none");
            $("#btn-delete").css("display", "none");
            $("#btn-cancel-edit").css("display", "inline-block");
            $("#btn-update").css("display", "inline-block");
        }
    }
    toggleEdit(true);

    
    $(document).on("keyup", "#txt-search", function(){
        var item = $(this).val();
        
        $.post("api/search-donation.php", 
        {
            item: item
        },
        function(data, status) {
            $("#table-blood-donations").html(data);
            $("#txt-search").focus();
        });
    });
});
