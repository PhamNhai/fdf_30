$(document).ready(function() {

    $("#click").click(function() {
        $("#logout-form").submit();
    });

    $("div.alert").delay(3000).slideUp();

     $(".fixform").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
});
