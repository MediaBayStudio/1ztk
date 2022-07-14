<?php
  $p_thumb = get_the_post_thumbnail_url( $post );
?>

<section class="news container sect">
  <article class="news__cnt">
    <header class="news__header">
      <picture class="news__header-pic">
        <source type="image/webp" srcset="<?php echo str_replace( '.jpg', '.webp', $p_thumb ) ?>">
        <img src="<?php echo $p_thumb ?>" alt class="news__header-img">
      </picture>

      <!-- <time class="news__date" pubdate datetime="<?php #echo get_the_date( 'd-m-Y' ) ?>"><?php #echo the_time( 'j F Y' ) ?></time> -->

      <h1 class="news__title"><?= $post->post_title ?></h1>
    </header>

    <div class="news__body">
      <?php echo apply_filters( 'the_content', get_the_content( null, null, $post->ID ) ); ?>
    </div>
  </article>

  <aside class="news__side">
    <?php
      $r_news = get_posts([
        'post_type' => 'post',
        'numberposts' => 3,
        'exclude' => $post->ID,
        'meta_key' => 'order_by',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
      ]);

      if ( count( $r_news > 1 ) ) : ?>
        <article class="related-news">
          <h2 class="related-news__title">Свежие новости</h2>

          <ul class="related-news__list">
            <?php foreach ( $r_news as $r_item) : ?>
              <li class="related-news__item">
                <article>
                  <a href="<?= get_permalink( $r_item ) ?>" class="related-news__item-link">
                    <picture class="related-news__item-pic">
                      <source type="image/webp" srcset="<?php echo str_replace( '.jpg', '.webp', get_the_post_thumbnail_url( $r_item) ) ?>">
                      <img src="<?php echo get_the_post_thumbnail_url( $r_item) ?>" alt="<?= $r_item->post_title ?>" class="related-news__item-img">
                    </picture>

                    <div class="related-news__item-descr">
                      <h3 class="related-news__item-title"><?= $r_item->post_title ?></h3>
                      <!-- <time class="related-news__item-date" pubdate datetime="<?php // echo get_the_date( 'd-m-Y', $r_item ) ?>"><?php // echo get_the_time( 'j F Y', $r_item ) ?></time> -->
                    </div>
                  </a>
                </article>
              </li>
            <?php endforeach ?>
          </ul>
        </article>
      <?php endif ?>

    <div id="vk_groups"></div>
  </aside>
</section>

<script type="text/javascript">
  VK.Widgets.Group("vk_groups", {mode: 3,width: 'auto', height: 260, color1: "FFFFFF", color2: "000000", color3: "5181B8"}, 204140712);
</script>