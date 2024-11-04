$(function(){
    $(".delete").on("click",function(){
        var id = $(this).data("id");
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function (response) {
                if(response.status){
                    location.reload();
                }
            },
        });
    });
    $(".details").on("click",function(){
        var id = $(this).data("id");
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function (response) {
                if(response.status){
                    // Insert the returned HTML into the results div
                    $("#details").html(response.html);
                }
            },
        });
    });
    $("#edit").on("click",function(){
        var id = $(this).data("id");
        $.ajax({
            url: $(this).data("url"),
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function (response) {
                if (response.status) {
                    $("#editModal").html(response.html)
                }
            },
        });
    });
});