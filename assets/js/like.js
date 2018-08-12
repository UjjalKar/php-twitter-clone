$(function() {
	$(document).on('click', '.like-btn', function() {
		var tweet_id 	= $(this).data('tweet');
		var user_id 	= $(this).data('user');
		var counter 	= $(this).find('.likesCounter');
		// var count 		= counter.text();
		var button 		= $(this);

		$.post('http://localhost/Projects/twitter/core/ajax/like.php', {like:tweet_id, user_id:user_id}, function(data) {
			// counter.show();
			button.addClass('unlike-btn');
			button.removeClass('like-btn');
			// counter.text(count);
			button.find('.fa-heart-o').addClass('fa-heart');
			button.find('.fa-heart').removeClass('fa-heart-o');
			data = JSON.parse(data);
			counter.text(data[0].likesCount);
		});
	});	

	$(document).on('click', '.unlike-btn', function() {
		var tweet_id 	= $(this).data('tweet');
		var user_id 	= $(this).data('user');
		var counter 	= $(this).find('.likesCounter');
		// var count 		= counter.text();
		var button 		= $(this);

		$.post('http://localhost/Projects/twitter/core/ajax/like.php', {unlike:tweet_id, user_id:user_id}, function(data) {
			counter.show();
			button.addClass('like-btn');
			button.removeClass('unlike-btn');

			data = JSON.parse(data);
			// count = data[0].likesCount;

			if(data[0].likesCount === 0) {
				counter.text('');
			} else {
				counter.text(data[0].likesCount);
			}
			
			button.find('.fa-heart').addClass('fa-heart-o');
			button.find('.fa-heart-o').removeClass('fa-heart');
		});
	});	
});