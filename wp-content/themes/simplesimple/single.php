<?php 
/****************************************

	single.php
	
	個別記事ページを表示するための
	テンプレートファイルです。
	
	single.php のコードに関しては、
	CHAPTER 10 で詳しく解説しています。

*****************************************/

get_header(); ?>
<!-- single.php -->
<div id="main">

	<?php 
	if (have_posts()) : // WordPress ループ
		while (have_posts()) : the_post(); // 繰り返し処理開始 ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<p class="post-meta">
					<span class="post-date"><?php echo get_the_date(); ?></span>
					<span class="category">Category - <?php the_category(', ') ?></span>
					<span class="comment-num"><?php comments_popup_link('Comment : 0', 'Comment : 1', 'Comments : %'); ?></span>
				</p>
					
				<?php the_content();
				
				$args = array(
					'before' => '<div class="page-link">',
					'after' => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>',
				);
				wp_link_pages($args); ?>
					
				<p class="footer-post-meta">
					<?php the_tags('Tag : ',', '); ?>
					<span class="post-author">作成者 : <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
				</p>
			</div>
				
			<div class="navigation"><!-- ページャー -->
				<?php 
				if(get_previous_post()): ?>
					<div class="alignleft"><?php previous_post_link('%link', '&laquo; %title'); ?></div>
				<?php 
				endif;
				
				if(get_next_post()): ?>
					<div class="alignright"><?php next_post_link('%link', '%title &raquo;'); ?></div>
				<?php 
				endif; 
				?>
			</div>
				
			<?php comments_template(); // コメント欄の表示 ?>
				
		<?php 
		endwhile; 
		?>
			
	<?php 
	else : 
	?>
		<div class="post">
			<h2>記事はありません</h2>
			<p>お探しの記事は見つかりませんでした。</p>
		</div>
	<?php 
	endif; 
	?>

</div><!-- /main -->
<!-- /single.php -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>