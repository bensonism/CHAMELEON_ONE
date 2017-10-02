<?php 
/*
Template Name: Homepage
*/
get_header(); ?>

<div class="o-site-wrap o-site-wrap--padding">

<section class="o-layout u-clear">
  <div class="o-grid">
    <div class="o-grid__item u-1/1">
      <h1>Animate CSS - SASS PORT</h1>
      <div class="animated bounceIn">
        <p>Watch me bounce in!</p>
      </div>
    </div>
  </div>
</section>


<section class="o-layout">
  <div class="o-grid o-grid--gutter-md o-grid--matrix">
    <div class="o-grid__item u-1/2">
      <div class="c-demo">
        test half
      </div>
    </div>
    <div class="o-grid__item u-1/2">
      <div class="c-demo">
        test half
      </div>
    </div>
  </div>
</section>

<section class="o-layout">
  <div class="o-grid">
    <div class="o-grid__item u-1">
      <h1>Fancybox Video</h1>
    </div>
    <div class="o-grid__item u-1/2">
      <a href="https://www.youtube.com/watch?v=InRDF_0lfHk" class="open-popup">
        View Video 1
      </a>
    </div>
    <div class="o-grid__item u-1/2">
      <a href="https://www.youtube.com/watch?v=lZlqr2PFJIo" class="open-popup">
        View Video 2
      </a>    
    </div>         
  </div>
</section>

<section class="o-layout">
  <div class="o-grid o-grid--gutter-md">
    <div class="u-1/1 o-grid__item">
      this is a test 1
    </div> 
      <div class="u-1/2 o-grid__item">
      this is a test 12
    </div> 
    <div class="u-1/2 o-grid__item">
      this is a test 12
    </div> 
  </div>  
</section>

<section class="o-layout">
    <h1>Fancybox Gallery</h1>
  <a class="fancybox" rel="gallery1" href="http://farm2.staticflickr.com/1669/23976340262_a5ca3859f6_b.jpg" title="Twilight Memories (doraartem)">
    <img src="http://farm2.staticflickr.com/1669/23976340262_a5ca3859f6_m.jpg" alt="" />
  </a>
  <a class="fancybox" rel="gallery1" href="http://farm2.staticflickr.com/1459/23610702803_83655c7c56_b.jpg" title="Electrical Power Lines and Pylons disappear over t.. (pautliubomir)">
    <img src="http://farm2.staticflickr.com/1459/23610702803_83655c7c56_m.jpg" alt="" />
  </a>
  <a class="fancybox" rel="gallery1" href="http://farm2.staticflickr.com/1617/24108587812_6c9825d0da_b.jpg" title="Morning Godafoss (Brads5)">
    <img src="http://farm2.staticflickr.com/1617/24108587812_6c9825d0da_m.jpg" alt="" />
  </a>
  <a class="fancybox" rel="gallery1" href="http://farm4.staticflickr.com/3691/10185053775_701272da37_b.jpg" title="Vertical - Special Edition! (cedarsphoto)">
    <img src="http://farm4.staticflickr.com/3691/10185053775_701272da37_m.jpg" alt="" />
  </a>  
</section>

<div class="o-layout">
    <h1>LITY</h1>
    <a href="https://farm9.staticflickr.com/8642/16455005578_0fdfc6c3da_b.jpg" data-lity data-lity-desc="Photo of a flower">Image</a>
    <a href="#inline" data-lity>Inline</a>
    <a href="//www.youtube.com/watch?v=XSGBVzeBUbk" data-lity>iFrame Youtube</a>
    <a href="//vimeo.com/1084537" data-lity>iFrame Vimeo</a>
    <a href="//maps.google.com/maps?q=1600+Amphitheatre+Parkway,+Mountain+View,+CA" data-lity>Google Maps</a>

    <div id="inline" style="background:#fff" class="lity-hide">
    Inline content
    </div>
</div>

<div class="o-layout">
    <h1>REMODAL</h1>
<div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Remodal</h1>
  <p>
    Responsive, lightweight, fast, synchronized with CSS animations, fully customizable modal window plugin with declarative configuration and hash tracking.
  </p>
  <br>
  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
</div>

<a data-remodal-target="modal" href="#">Call the modal with data-remodal-id="modal"</a>

</div>

<div class="o-layout">
    <h1>Owl Slider</h1>
    <div class="c-slider"> 
    <div  class="c-slider__item" style="background:url(https://images.unsplash.com/uploads/141219324227007364f95/be0967a3?dpr=2&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=)no-repeat; background-size:cover; background-position: center center;"></div>
    <div class="c-slider__item" style="background:url(https://images.unsplash.com/uploads/1413142095961484763cf/d141726c?dpr=2&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=)no-repeat; background-size:cover; background-position: center center;"></div>
    <div class="c-slider__item" style="background:url(https://images.unsplash.com/photo-1459716854666-062eac2da3bd?dpr=2&auto=format&fit=crop&w=1500&h=844&q=80&cs=tinysrgb&crop=)no-repeat; background-size:cover; background-position: center center;"></div>
    <div class="c-slider__item" style="background:url(https://images.unsplash.com/photo-1466150036782-869a824aeb25?dpr=2&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=)no-repeat; background-size:cover; background-position: center center;"></div>        
    </div>

</div>

<div class="c-loading"></div>

<div class="o-layout">

<h1>Fluid-width Navigation</h1>

<nav class="demo-nav">
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Products</a></li>
    <li><a href="#">Jobs</a></li>
    <li><a href="#">Contact</a></li>
    <li id="x" class="x"><a href="#">Privacy</a></li>
  </ul>
</nav>

</div>

<hr>
<hr>
<div class="o-layout">
<div id="grid-equal-height" class="o-section-md">
      <h3 id="grid-equal-height">Equal height</h3>
      <div class="o-grid o-grid--gutter-md o-grid--equal-height">
        <div class="o-grid__item u-1/4@md u-1/1 ">
          <div class="c-demo">
            1
          </div>
        </div>
        <div class="o-grid__item u-1/2">
          <div class="c-demo">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla nesciunt voluptatem asperiores culpa quasi autem placeat commodi explicabo sit ipsum at eaque, voluptatum necessitatibus aperiam nam ullam maiores harum, iure.
          </div>
        </div>
      </div>
    </div>
</div>
<hr>
<hr>

<div class="o-layout">
<div class="u-push-bottom-md">
        <div class="o-grid o-grid--gutter-md o-grid--matrix">
          <div class="o-grid__item u-1/2@md u-1/4@sm">
            <div class="c-demo">
              md
            </div>
          </div>
          <div class="o-grid__item u-1/2@md u-1/4@sm">
            <div class="c-demo">
              md
            </div>
          </div>
        </div>
      </div>
|</div>
<hr>
<hr>

<br><br>

<div class="o-layout">
  <div class="o-grid o-matrix o-grid--guttermd">

        <h2>
          MixIT up
        </h2>
        <ul id="mix-category" class="o-bare-list">
          <li class="o-grid__item u-1/5"><a class="filter active" data-filter="all" href="#">ALL</a></li>
          <li class="o-grid__item u-1/5"><a class="filter" data-filter=".category-109" href="#">cat 109</a></li>
          <li class="o-grid__item u-1/5"><a class="filter" data-filter=".category-110" href="#">cat 110</a></li>
          <li class="o-grid__item u-1/5"><a class="filter" data-filter=".category-112" href="#">cat 112</a></li>						
          <li class="o-grid__item u-1/5"><a class="filter" data-filter=".category-137" href="#">cat 137</a></li>
        </ul>      

          <div id="mix">
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-137">
                  <div class="item-info-container">
                      <h2>Test Item - category-137</h2>
                  </div>
              </div>
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-109">
                  <div class="item-info-container">
                      <h2>Test Item - category-109</h2>
                  </div>
              </div>
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-110">
                  <div class="item-info-container">
                      <h2>Test Item - category-110</h2>
                  </div>
              </div>
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-112">
                  <div class="item-info-container">
                      <h2>Test Item - category-112</h2>
                  </div>
              </div>
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-137">
                  <div class="item-info-container">
                      <h2>Test Item - category-137</h2>
                  </div>
              </div>
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-137">
                  <div class="item-info-container">
                      <h2>Test Item - category-137</h2>
                  </div>
              </div>
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-112">
                  <div class="item-info-container">
                      <h2>Test Item - category-112</h2>
                  </div>
              </div>
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-110">
                  <div class="item-info-container">
                      <h2>Test Item - category-110</h2>
                  </div>
              </div>    
              <div class="o-grid__item u-1/3@md u-1/4@sm mix category-110">
                  <div class="item-info-container">
                      <h2>Test Item - category-110</h2>
                  </div>
              </div>                  
              <div class="u-clearfix"></div>
      </div>
  </div>
</div>

<hr>
<hr>

<br>

<div class="o-layout">
  <div class="o-grid o-matrix o-grid--guttermd">
    <h2>
      MASONRY
    </h2>
    <ul class="c-masonry list-reset">
      <li class="c-masonry__grid-item">Lorem ipsum dolor.</li>
      <li class="c-masonry__grid-item">Fuga, impedit, sint.</li>
      <li class="c-masonry__grid-item">Exercitationem, modi, vitae.</li>
      <li class="c-masonry__grid-item">Cumque, nam, dolorem.</li>
      <li class="c-masonry__grid-item">Itaque necessitatibus, corporis!</li>
      <li class="c-masonry__grid-item">Quas, minus, at.</li>
      <li class="c-masonry__grid-item">Accusamus, at, rem.</li>
      <li class="c-masonry__grid-item">Dolore, exercitationem, recusandae.</li>
      <li class="c-masonry__grid-item">Quam, modi, earum?</li>
    </ul>
  </div>
</div>

<hr>
<hr>
<br>

</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>role="article">
    <header class="article-header">
        <h1 class="h2 entry-title" itemprop="name"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <p class="byline entry-meta vcard">
            <?php 
            printf( __( 'Posted', 'REPTILEHAUS' ).' %1$s %2$s',
            /* the time the post was published */
            '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
            /* the author of the post */
            '<span class="by">'.__( 'by', 'REPTILEHAUS').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
            ); ?>
        </p>
    </header>
    <section class="content" itemprop="description">
        <?php the_content(); ?>
    </section>
</article>
<?php endwhile; else : ?>
<article id="post-not-found" class="hentry cf">
    <header class="article-header">
        <h1><?php _e( 'Oops, Post Not Found!', 'REPTILEHAUS' ); ?></h1>
    </header>
    <section class="entry-content">
        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'REPTILEHAUS' ); ?></p>
    </section>
    <footer class="article-footer">
        <p><?php _e( 'This is the error message in the index.php template.', 'REPTILEHAUS' ); ?></p>
    </footer>
</article>
<?php endif; ?>

<?php get_footer(); ?>