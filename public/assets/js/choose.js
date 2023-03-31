function choose(val) {
    var id = document.getElementById(val).value;

    $.ajax({
        method: "GET",
        url: "/ajax/"+val+"/"+id,
        success: function (res) {
            $("#choose_sub_"+val).html(res);
        },
    });
}