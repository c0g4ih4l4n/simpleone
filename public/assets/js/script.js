
function test() {
	alert('Yes');
}

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
