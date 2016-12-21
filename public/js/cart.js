


$(".update-cart").click(function(){
	var baseUrl = "http://localhost:8000/";

    var parent = $(this).closest('tr');
    var quantity = parent.find("input").val();
    var rowId = parent.find(".rowId").text();
    var url = baseUrl + "update-cart/" + rowId + "/" + quantity;
    window.location = url;
});