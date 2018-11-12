<?php


add_filter( 'algolia_searchable_post_shared_attributes', 'my_post_attributes', 10, 2 );

/**
 * @param array   $attributes
 * @param WP_Post $post
 *
 * @return array
 */
function my_post_attributes( array $attributes, WP_Post $post ) {

    if ( 'jobs' !== $post->post_type ) {
        // We only want to add an attribute for the 'speaker' post type.
        // Here the post isn't a 'speaker', so we return the attributes unaltered.
        return $attributes;
    }

    // Get the field value with the 'get_field' method and assign it to the attributes array.
    // @see https://www.advancedcustomfields.com/resources/get_field/
    $attributes['job_id'] =  get_field( 'job_id', $post->ID );
    $attributes['name'] = get_field('name' , $post->ID);
    $attributes['address'] = get_field('address' , $post->ID);
    $attributes['macro_address'] = get_field('macro_address' , $post->ID);
    $attributes['company'] = get_field('company' , $post->ID);
    $attributes['city'] = get_field('city' , $post->ID);
    $attributes['zipcode'] = get_field('zipcode' , $post->ID);
    $attributes['country_code'] = get_field('country_code' , $post->ID);
    $attributes['salary'] = get_field('salary' , $post->ID);
    $attributes['job_title'] = get_field('job_title' , $post->ID);
    $attributes['status'] = get_field('status' , $post->ID);
    $attributes['category'] = get_field('category' , $post->ID);
    $attributes['job_type'] = get_field('job_type' , $post->ID);
    $attributes['state']    = get_field('state' , $post->ID);

    // Always return the value we are filtering.
    return $attributes;
}


/**
 * @param bool    $should_index
 * @param WP_Post $post
 *
 * @return bool
 */
function exclude_post_types( $should_index, WP_Post $post )
{
    // Add all post types you don't want to make searchable.
    $excluded_post_types = array( 'page' , 'posts', 'Posts' , 'media', 'post');
    if ( false === $should_index ) {
        return false;
    }

    return ! in_array( $post->post_type, $excluded_post_types, true );
}

// Hook into Algolia to manipulate the post that should be indexed.
add_filter( 'algolia_should_index_searchable_post', 'exclude_post_types', 10, 2 );
