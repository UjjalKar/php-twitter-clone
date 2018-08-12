$(function() {
    $(document).on('click', '.retweet', function() {
        // make super global variale use $ sign front of it
        $tweet_id    = $(this).data('tweet');
        $user_id     = $(this).data('user');
        $counter     = $(this).find('.retweetsCount');
        $count       = $counter.text();          
        $button      = $(this);
        

        $.post('http://localhost/Projects/twitter/core/ajax/retweet.php', {showPopup:$tweet_id, user_id:$user_id}, function(data) {
            // console.log(data);
            
            $('.popupTweet').html(data);
            $('.close-retweet-popup').click(function() {
                $('.retweet-popup').hide();
            });
        });
    });

    $(document).on('click', '.retweet-it', function() {
        var comment = $('.retweetMsg').val();
        $.post('http://localhost/Projects/twitter/core/ajax/retweet.php', {retweet:$tweet_id, user_id:$user_id, comment:comment}, function() {
            $('.retweet-popup').hide();
            $count++;
            $counter.text($count);
            $button.removeClass('retweet').addClass('retweeted');
        });
       
    });
});