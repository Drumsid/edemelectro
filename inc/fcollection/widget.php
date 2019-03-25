<?php 

add_action('widgets_init','f_collection');

function f_collection() {
    register_widget('F_Сollection');
}

class F_Сollection extends WP_Widget{

    function F_Сollection() {

        $widget_ops = array(
                            'classname' => 'myTempl',
                            'description' => 'Описание'
                            );
        $control_ops = array(
                            'width' => 300,
                            'height' => 350
                            );

        $this->WP_Widget('fcollection', 'Featured Collection', $widget_ops, $control_ops);
    }


    function update($new_instance, $old_instance){

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['pcount'] = strip_tags($new_instance['pcount']);

        return $instance;
    }

    public function widget($args, $instance) {

        $title = apply_filters('widget_title', $instance['title']) ;
        $pcount = $instance['pcount'];

        include "templ.php";
    }

    function form($instance) {

        $defaults = array(
            'title' => 'Featured Collection',
            'pcount' => 9
        );

        $instance = wp_parse_args((array)$instance, $defaults); ?>
    <p>
        <label for="<?php echo $this->get_field_id('title')?>">Title</label>
        <input id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $instance['title'];?>" style="width:100%;">
    
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('pcount')?>">Count Products</label>
        <input id="<?php echo $this->get_field_id('pcount')?>" name="<?php echo $this->get_field_name('pcount')?>" value="<?php echo $instance['pcount'];?>" style="width:100%;">

    </p>

    <?php
    }
}

?>