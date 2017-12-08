<?php 

$dir = "events/";

//Dir Level 1
$cdir = scandir($dir); 
foreach ($cdir as $key => $value) 
{ 
   if (!in_array($value,array(".",".."))) 
   { 
      if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
      { 
        // $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
        echo "dir -- ".$value."<br>";
        // Dir Level 2
        $dir_2 = $dir . DIRECTORY_SEPARATOR . $value;
        $cdir_lvl2 = scandir($dir_2); 

        foreach ($cdir_lvl2 as $value_lvl2) {
            if (!in_array($value_lvl2,array(".",".."))) 
            { 
               if (is_dir($dir_2 . DIRECTORY_SEPARATOR . $value_lvl2)) 
               { 
                    echo "dir 2 -- ".$value_lvl2  ."<br>";

                     // Dir Level 3 For Images Saving
                    $dir_3 = $dir_2 . DIRECTORY_SEPARATOR . $value_lvl2;
                    $cdir_lvl3 = scandir($dir_3); 

                    foreach ($cdir_lvl3 as $value_lvl3) {
                        if (!in_array($value_lvl3,array(".",".."))) 
                        { 
                            if (!is_dir($dir_3 . DIRECTORY_SEPARATOR . $value_lvl3)) 
                            { 
                                    echo "File -- ".$value_lvl3  ."<br>";
                            }
                        }
                    }
               }
            }
        }

      }  
   } 
} 

/*
$post_args = array( // Set up the basic post data to insert for our product
        'post_author'  => $product_data->post_author,
        'post_content' => $course_post->post_content,
        'post_status'  => 'publish',
        'post_title'   => $product_data->post_title,
        'post_type'    => 'product'
    );

	remove_action( 'save_post', 'ci_create_product_function', 100, 3 );

   $post_id = wp_insert_post($post_args); // Insert the post returning the new post id

    if (!$post_id) // If there is no post id something has gone wrong so don't proceed
    {
        return false;
    }

	$course_price = get_post_meta($course_post->ID, 'ci_course_price', true);

    update_post_meta($post_id, '_sku', $product_data->ID); // Set its SKU
    update_post_meta( $post_id,'_visibility','visible'); // Set the product to visible, if not it won't show on the front end
    update_post_meta( $post_id,'_regular_price',$course_price);
	update_post_meta( $post_id,'_price',$course_price); 
	update_post_meta( $post_id,'_virtual','yes');
	update_post_meta( $post_id,'_sold_individually','yes');
   */
