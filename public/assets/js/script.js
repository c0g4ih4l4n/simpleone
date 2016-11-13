
function postComment(id){
	$.ajax({
		type:'POST',
		url:'/product/' + id + '/comment',
		data:'_token=' + token,
		success:function(data){
		  	alert('Yes');
		}
	});
}

// jquery change click category
$(document).ready(function () {
	$('.category-search').click(function () {
		$('#category-dropdown').text($(this).text());
	})
});