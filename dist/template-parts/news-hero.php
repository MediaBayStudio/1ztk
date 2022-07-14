<?php
  $news = get_posts([
    'post_type' => 'post',
    'numberposts' => -1,
    'meta_key' => 'order_by',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
  ])
?>

<section class="news-hero container">
  <h1 class="sect-h1 sect-title-underline">Новости</h1>

  <ul class="news-list">
    <?php foreach ( $news as $n ) :
      $title = $n->post_title;
      $link = get_permalink( $n );
      $pic = get_the_post_thumbnail_url( $n );
      $pic_webp = str_replace( '.jpg', '.webp', $pic );
    ?>
      <li class="news-list__item">
        <article>
          <a href="<?= $link ?>" class="news-list__item-link">
            <picture class="news-list__item-pic">
              <source type="image/webp" srcset="<?= $pic_webp ?>">
              <img src="<?= $pic ?>" alt="<?= $title ?>" class="news-list__item-img">
            </picture>
            <h2 class="news-list__item-title"><?= $title ?></h2>
            <!-- <time class="news-list__item-date" pubdate datetime="<?php // echo get_the_date( 'd-m-Y', $n ) ?>"><?php // echo get_the_time( 'j F Y', $n ) ?></time> -->
          </a>
        </article>
      </li>
    <?php  endforeach ?>
  </ul>
</section>