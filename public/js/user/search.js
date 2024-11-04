$(function(){
    $(".search").on("keyup", function () {
        var keywords = $(this).val();
        //console.log("Searching for: " + keywords);

        if (keywords.trim() !== "") {
            $.ajax({
                url: $(this).data("url"),
                type: "GET",
                dataType: "JSON",
                data: {
                    search: keywords,
                },
                success: function (response) {
                    // Insert the returned HTML into the results div
                     $("#results").html(response.html);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                },
            });
        } else {
            window.location.href = $(this).data("url");
        }
    });
    $(".status").on("change", function () {
        var status = $(this).val();
            $.ajax({
                url: $("#search").data("url"),
                type: "GET",
                dataType: "JSON",
                data: {
                    status: status,
                },
                success: function (response) {
                    // Insert the returned HTML into the results div
                     $("#results").html(response.html);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                },
            });

    });
});