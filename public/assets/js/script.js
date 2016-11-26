
/**
 * For post Comment using ajax
 * @param  {int} id this is an id of object user comment to
 * @return {response}
 */
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


$(function() {
    $('.confirm').click(function(event) {
        return window.confirm("Are you sure?");
    });
});


// jquery change click category
$(document).ready(function () {
	$('.category-search').click(function () {
		$('#category-dropdown').html($(this).text() + " <span class='caret'></span>");
	})
});