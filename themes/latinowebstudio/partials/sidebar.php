<?php 

echo '<div class="col-lg-3 col-12 order-2 sidebar">';
// echo '<div class="card p-3 mb-2">';
// get_search_form();
// echo '</div>';

?>

<div class="card text-center">
	<?php 
	echo wp_get_attachment_image(3012,'full','',array(
    'class'=>'w-100',
    'style'=>'height:100%;object-fit:cover;'
));
	?>
<!-- 	<p class="small">How to Choose the Right Expert Witness Without Risking Your Case</p> -->
	<?php 
	echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');
	?>
</div>

<div class="card text-center">
<div>
<?php echo wp_get_attachment_image(256, 'full', false, array(
    'class' => '',
    'style' => 'width:150px;height:150px;border-radius:50%;object-fit:cover;object-position:top;'
)); ?>
</div>
<a href="#expert-witness" class="btn-main small">Speak with an Expert</a>
<a href="/wp-content/uploads/2025/01/Mark_McFarland-CV-notRetained.pdf" target="_blank" class="btn-main outline small">Download CV</a>
</div>

<?php
echo '<div class="card p-3 mt-2 mb-2">';
echo '<h3 class="teko">Recent Posts</h3>';

$recentBlog = new WP_Query(array(
'posts_per_page' => 5,
'post_type' => 'post',
'post__not_in' => [get_the_ID()],
));
echo '<ul>';
while($recentBlog->have_posts()){
$recentBlog->the_post();
echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
} wp_reset_postdata();
echo '</ul>';
echo '</div>';
echo '</div>';

?>