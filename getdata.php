<?php

	$url ="https://www.filson.com/blog/wp-json/wp/v2/posts";
	$res = get_remote_data($url);
	$arr[] = json_decode($res);
	foreach($arr as $posts)
	{
		foreach($posts as $post){
			$str .= "<div class='bg-light p-2'>
				<a href='".$post->link."' target='blank'>".$post->title->rendered."
				<br><br>".$post->excerpt->rendered;
			//	Sorry did not have time to grab the image, but how to do it:
			//get wp:attachment->href url, get remote data from that url and extract featured image url from there and put image tag here
			$str .= "</a>
			</div>
			<span class='clearfix'>&nbsp;</span>
			";
		}

	}
	echo json_encode(array('success'=>$str));

	function get_remote_data($url)
	{
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION  => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		  ]);

		$response = curl_exec($curl);
		curl_close($curl);

		return $response;
	}
?>
