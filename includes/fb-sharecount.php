<script>
$j = jQuery.noConflict();		
		$j( document ).ready(function() {
 //Set Url of JSON data from the facebook graph api. make sure callback is set with a '?' to overcome the cross domain problems with JSON
 



// Reference: http://stackoverflow.com/questions/5699270/how-to-get-share-counts-using-graph-api

var url = "https://graph.facebook.com/fql?q=SELECT url, normalized_url, share_count, like_count, comment_count, total_count,commentsbox_count, comments_fbid, click_count FROM link_stat WHERE url='<?php echo get_permalink();?>'";



 //Use jQuery getJSON method to fetch the data from the url and then create our unordered list with the relevant data.
    $j.getJSON(url,function(json){
        console.log(JSON.stringify(json));
        $j('#facebookfeed').animate({opacity:0}, 500, function(){
            $j('#facebookfeed').html("<span class='sharecount'>"+json.data[0].share_count+"</span>");
        });
        $j('#facebookfeed').animate({opacity:1}, 500);
 
    });
});
</script>
