<?php
/* @var $posts */
include __DIR__ . '/templates/header.php'; 
?>
<?php include __DIR__ .'/templates/cardPosts.php'?>

    <section class="page-head">
        <div class="grid-wrapper">
            <?php
                postsCards('type1', $posts[0] );
                postsCards('type1', $posts[1] );
                postsCards('type1', $posts[2] );
             ?>
        </div>
    </section>
    <section class="topic topic1">
        <h1 class="topic-title">Topic 1</h1>
        <div class="post-container">
            <?php foreach( $posts as $data ){
                    postsCards('type2', $data);
            } ?>
        </div>
    </section>
    <section class="topic topic2">
        <h1 class="topic-title">Topic 2</h1>
        <div class="post-container">
            <?php foreach( $posts  as $data ){
                    postsCards('type3', $data);
            } ?>
        </div>
    </section>
<?php include __DIR__ . '/templates/footer.php' ?>