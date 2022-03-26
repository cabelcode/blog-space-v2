<?php include __DIR__ . '/templates/header.php'; ?>
<?php include __DIR__ .'/templates/cardPosts.php'?>

    <div class="content-margin">
        <h2 class="date-title">Search by date</h2>
        <form class="date-container" method="get">
    
            <div class="date-select-container">
                <label class="date-label" for="startDate">Start Date</label>
                <input class="date-input" type="date" name="startDate" id="startDate"/>
            </div>
            <div class="date-select-container">
                <label class="date-label" for="endDate">End Date</label>
                <input class="date-input" type="date" name="endDate" id="endDate"/>
            </div>
            <button class="date-btn">Search</button>
        </form>

        <div class="result-container">

            <?php 
            if( !empty( $result )){
                foreach( $result as $data){
                    postsCards('type3', $data);
                }
            }
            ?>

            <?php if( !empty( $error ) ):?>
                <div class="error-container">
                    <img src="/images/huh2.png"/>
                    <?php echo $error;?>
                </div>
            <?php endif;?>

        </div>

        <ul class="pagination">
            <?php  
            if( !empty( $availPage )):
                
                if($availPage > 10){
                    if($page < 6){
                        $startPage = 1;
                        $endPage = $startPage + 9;
                    }elseif( $page + 6 >= $availPage){
                        $startPage = $availPage - 10;
                        $endPage = $availPage;
                    }else{
                        $startPage = $page - 4;
                        $endPage = $page + 6;
                    }
                }else{
                    $startPage = 1;
                    $endPage = $availPage;
                }
            
                for($i=$startPage; $i <= $endPage; $i++):
                    $active = ( $page == $i ) ? " active" : "";
                ?>  
                
                    <li class="pagination-item<?php echo $active?>"   >
                        <?php echo "<a href='/search?startDate=".$start."&endDate=".$end."&page=".$i."'>".$i."</a>"?>
                    </li>

                <?php endfor;
            endif; ?>
        </ul>
    </div>
    

<?php include __DIR__ . '/templates/footer.php' ?>