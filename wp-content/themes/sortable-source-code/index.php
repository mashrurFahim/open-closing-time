<?php
    $fields_order_default = array(
        0 => array(
            'id' => '0',
            'name' => 'List Item 1',
            'slug' => 'list_item_1'
        ),
        1 => array(
            'id' => '1',
            'name' => 'List Item 2',
            'slug' => 'list_item_2'
        ),
        2 => array(
            'id' => '2',
            'name' => 'List Item 3',
            'slug' => 'list_item_3'
        ),
        3 => array(
            'id' => '3',
            'name' => 'List Item 4',
            'slug' => 'list_item_4'
        ),
        4 => array(
            'id' => '4',
            'name' => 'List Item 5',
            'slug' => 'list_item_5'
        ),
    );
?>

<?php get_header() ?>

<section>
    <div class="container">

        <ul>
        <?php 
            $filter_fields_order = get_option('filter_fields_order', $fields_order_default); 
            foreach($filter_fields_order as $value) { ?>

                <?php
                    if(isset($value['id'])) { $id = $value['id']; }
                    if(isset($value['name'])) { $name = $value['name']; }
                    if(isset($value['slug'])) { $slug = $value['slug']; }
                ?>

                <li><?php echo $name; ?></li>

        <?php } ?>
        </ul>

    </div><!-- end container -->
</section>

<?php get_footer() ?>