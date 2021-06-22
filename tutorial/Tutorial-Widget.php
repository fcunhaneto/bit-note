<?php
class Tutorial_Widget extends WP_Widget {
	public function __construct() {
		$id_base = 'tutorial';
		$name = 'Tutoriais';
		$description = 'Widget para apresentar os tutoriais';
		parent::__construct($id_base, $name, $description);
	}
	public function form($form) {
		if(!isset($form['titulo']))
			$form['titulo'] = 'Tutoriais';
		if(!isset($form['categoria']))
			$form['categoria'] = '';
		?>
	 		<label>Título  para o widget</label>
	 		<input class="widefat" name="<?php echo $this->get_field_name('titulo')?>" type="text" value="<?php echo $form['titulo']; ?>" ><br>
	 	<?php
	 }
	public function widget($args, $form = '') {
		$query = new WP_Query( array('post_parent' => 0, 'posts_per_page' => 10, 'post_type' => 'tutorial', 'orderby' => array('parent', 'menu_order')));
		?>
		<?php echo $args['before_widget']; ?>
		<?php echo $args['before_title']; ?>
 		<?php echo $form['titulo']; ?>
		<?php echo $args['after_title']; ?>
 		<ul>
		<?php while ($query->have_posts()): $query->the_post();?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
 		</ul>
		<?php echo $args['after_widget']; ?>
		<?php
 	}
 	public function update($new_instance, $old_instance){
 		$new_instance['titulo'] = !empty($new_instance['titulo']) ? $new_instance['titulo'] : '';
 		return $new_instance;
 	}
 }
function tutorial_register_widget(){
	register_widget('Tutorial_Widget');
}
add_action('widgets_init', 'tutorial_register_widget');
