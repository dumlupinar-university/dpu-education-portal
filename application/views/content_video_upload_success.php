<div id="content">
 
<dl>
 
    <dt>
 
        File Name:
 
    </dt>
 
    <dd>
 
        <?php echo $uploadInfo['file_name'];?>
 
    </dd>
 
    <dt>
 
        File Size:
 
    </dt>
 
    <dd>
 
        <?php echo $uploadInfo['file_size'];?>
 
    </dd>
 
    <dt>
 
        File Extension:
 
    </dt>
 
    <dd>
 
        <?php echo $uploadInfo['file_ext'];?>
 
    </dd>
 
    <br />
 
    <p>The Video:</p>
 
	<video width="480" height="320" controls>
		<source src="<?=base_url(). 'videos/' . $uploadInfo['file_name'];?>" type="video/mp4">
	</video>

</object>
 
</dl>
 
</div>
