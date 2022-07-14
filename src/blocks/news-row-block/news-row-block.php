<?php
  $news = get_posts([
    'post_type' => 'post',
    'numberposts' => 3,
    'meta_key' => 'order_by',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
  ]);

  $news_page_link = get_permalink(
    get_posts([
      'post_type' => 'page',
      'meta_key'  => '_wp_page_template',
      'meta_value'=> 'news.php'
    ])[0]
  );
?>

<?php if ( count( $news ) >= 3 ) : ?>

<section class="news-row-block sect container">
  <h2 class="sect-title sect-title-underline">Новости колледжа</h1>

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

  <a href="<?= $news_page_link ?>" class="news-row-block__link">Все новости</a>
</section>

<?php endif ?>