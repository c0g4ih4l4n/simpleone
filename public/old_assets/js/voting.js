
$(document).ready(function() {
	$('.votes_button').hover(
		function () {
			var id;
			var width;
			
			id = $(this).attr('id');

			width = id * 32;

			$('.votes_active').width(width + 'px'); 
		},
		function () {
			var val;
			val = $(this).parent().attr('val');
			width = val * 32;

			$('.votes_active').width(width + 'px');
		}
	);

	$('.votes_button').click(function () {
		var idVal = $(this).parent().attr('id');
        var iCnt = $(this).parent().attr('cnt');
        var voteVal = $(this).attr('id');
        var obj = $(this);
        var iSelWidth = voteVal * 32;
        var form = $(this).parentsUntil('form');
        form = form.parent();
        var url = 'http://localhost:8000/vote';
        var type;
        var values = {};
		$.each(form.serializeArray(), function(i, field) {
		    values[field.name] = field.value;
		});

        if (form.hasClass('product') != -1) {
        	type = "product";
        }
        else if (form.hasClass('review') != -1) {
        	type = "review";
        }
        else {
        	type = "comment";
        }

        $.post(url, { _token: values['_token'], vote_val: voteVal, voteable_id: values['vote_id'], voteable_type: type }, 
            function(data){
                if (data == 1) {
                    width = iSelWidth;
                    $('.votes_active').width(iSelWidth + 'px');
                    iCnt = parseInt(iCnt) + 1;
                    $('.votes_main span b').text(iCnt);
                    $('.votes_buttons').attr('val', voteVal);
                }
            }
        );
	});


});
