<div id = "content">


<?php

		echo '<p><h2><em>User</em></h2></p>';

	if ( !empty($results) )
	{
		
		echo '<p>Name : '.$results->name.'</p>';
		 
		echo '<p>Surname :'.$results->surname.'</p>';
		
		echo '<p>Email :'.$results->email.'</p>';

	}
	
		echo '<p><h2><em>Users Infos</h2></em></p>';
	
	if ( !empty($infos) )
	{
		
		echo '<p>Phone : '.$infos->phone.'</p>';
		 
		echo '<p>Skype :'.$infos->skype.'</p>';
		
		echo '<p>Facebook :'.$infos->facebook.'</p>';
		
		echo '<p>Birthday : '.$infos->birthday.'</p>';
		 
		echo '<p>Address :'.$infos->address.'</p>';
		
		echo '<p>Photo :'.$infos->photo.'</p>';
		
		echo '<p>Cv : '.$infos->cv.'</p>';
		 
		echo '<p>Description :'.$infos->description.'</p>';
		
		echo '<ul>';
	}

	
?>

</div>
