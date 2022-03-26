<?php 
include __DIR__ . '/templates/header.php';
include __DIR__ .'/templates/cardPosts.php'; ?>

    <?php if(isset($error)):?>
        <div class="error-container">
            <img src="/images/huh2.png"/>
            <?php echo $error;?>
        </div>
    <?php else:?>
    <div class="single-content">
        <?php 
            if( $media_type == 'video' || empty($url) ){
                $url = '/images/no-image.png';
            }
            $author = !empty($copyright) ? $copyright : 'John Doe';
            $date = date_format( date_create( $date ), "d/m/Y");
        ?>
        <main>
            <h1 class="single-title"><?php echo $title?></h1>
            <div class="single-detail">
                <div class="author">By: <?php echo $author?></div>
                <div class="date">Posted on: <?php echo $date?></div>
            </div>
            <img class="single-img" src=<?php echo '"'.$url.'"'?>>
            <p class="single-text"><?php echo $explanation?></p>
        </main>
        <aside>

            <div class="other-post">
                <?php
                    array_map( function($data){
                        postsCards('type3-sm', $data);
                    }, $result);
                ?>
            </div>
        </aside>
    </div>
    <?php endif?>                     
<?php include __DIR__ . '/templates/footer.php' ?>