    <?php

    function TFI_Awards_Custom_Single( $single_template )
    {
      /**
      * Paddy O'Sullivan @ebow digital
      * Checks for single template by category ID, If the cat id is the same as TFI Awards (37) 
      * then use tha custom single Otherwise use the standard single
      */
    
    $grab_categories = get_the_category($post->ID);
    
    $currentcat = $grab_categories[0]->cat_ID;
    
    //echo $currentcat;
    
      $newSingle = locate_template("single-tfi-awards.php");
    
      if( file_exists( $newSingle ) && $currentcat == 37 )
      {
        return $newSingle;
    
      } else {
    
        return $single_template;
    
      }
    
    }
    add_filter( 'single_template', 'TFI_Awards_Custom_Single', 10, 1 );
    
    





    // My search box function
    function LM_Search( $form ) {
      //Specify any custom post types in the hidden fields below marked xxxxxx
      $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input class="sb-search-input" placeholder="Search.." value="' . get_search_query() . '" name="s" id="search"  />
    <input class="sb-search-submit" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    <input type="hidden" value="xxxxxx" name="post_type[]" /> 
    <input type="hidden" value="xxxxxx" name="post_type[]" />
    <span class="sb-icon-search"><i class="fa fa-search"></i></span>
    </form>';
      return $form;
    }
    add_filter( 'get_search_form', 'LM_Search' );
    
    
    
    
    
    
    // search box function
    function LM_basic_search( $form ) {
      $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input  placeholder="Search.." value="' . get_search_query() . '" name="s" id="search"  />
    </form>';
      return $form;
    }
    add_filter( 'get_search_form', 'LM_basic_search' );
    
    
    
    
    
    
     // GET THE NAME OF THE MAIN PARENT PAGE
    function LM_get_parent_name(){
      $parent = array_reverse(get_post_ancestors($post->ID));
    
      $first_parent = get_page($parent[0]);
    
      echo ucfirst($first_parent->post_name);
    }






    function LM_top_level_parent_breadcrumbs() {
    /* 
    @author: Paddy O'Sullivan
    @description: Gets the top Most Parent and outputs breadcrumbs
    */
    $parent = array_reverse( get_post_ancestors( $post->ID ) );
    
    $ancestors = get_post_ancestors( $post->ID ) ;
    
        for( $i =0 ;  $i <= count( $ancestors ); $i++ )  {
    
            $parent_pages = get_page( $parent[$i] );
    
            $breadcrumb[] =  $parent_pages->post_title;
    
            $CleanCrumbs = implode(' - ' , $breadcrumb);
    
        }
    
      print $CleanCrumbs;
    }














function add_anchorclass( $anchorclass ) {
    return preg_replace( '/<a /', '<a class="LMD-link"', $anchorclass );
}
add_filter( 'wp_nav_menu', 'add_anchorclass' );
