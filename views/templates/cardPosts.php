<?php 
    /* @var $posts */
    function postsCards($type, $data)
    {  
        if($data['media_type'] == 'video' || empty($data['url']) ){
            $data['url'] = '/images/no-image.png';
        }

        if( strlen($data['explanation']) > 20 ){
            $cardSummary = explode(" ", $data['explanation']);
            array_splice($cardSummary, 20);
            array_push($cardSummary, '...');
            $cardSummary = implode( " ", $cardSummary);
        }else{
            $cardSummary = $data['explanation'];
        }

        switch ($type) {
            case 'type1': ?>
                <div class="card type1"  >
                    <div class="card-image" style=<?php echo "'background-image:url(" . $data['url'] . ")'"?>>
                        <a href=<?php echo "/post?date=". $data['date']?>>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $data['title']?></h2>
                                <div class="card-text">
                                    <span class="author"><?php echo !empty($data['copyright']) ? $data['copyright'] : 'John Doe'?></span>
                                    <span class="date"><?php 
                                        echo "- " . date_format( date_create( $data['date'] ), "d/m/Y")  
                                    ?></span>
                                    <div class="card-summary">
                                        <?php echo $cardSummary?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php break;
            case 'type2': ?>
                <div class="card type2">
                    <img class="card-image" src=<?php echo '"'. $data['url'] . '"'?> alt="space"/>
                    <a href=<?php echo "/post?date=". $data['date']?>>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $data['title']?></h2>

                            <div class="card-text">
                                    <div class="card-summary">
                                    <?php echo $cardSummary?>
                                </div>
                                <span class="author"><?php echo !empty($data['copyright']) ? $data['copyright'] : 'John Doe'?></span>
                                <span class="date"><?php 
                                    echo "- " . date_format( date_create( $data['date'] ), "d/m/Y") 
                                ?></span>
                                
                            </div>
                        </div>
                    </a>
                </div>
            <?php break;
            case 'type3': ?>
                <div class="card type3">
                    <div class="card-image" style=<?php echo "background-image:url(" . $data['url'] . ")"?>></div>
                    <a href=<?php echo "/post?date=". $data['date']?>>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $data['title']?></h2>
                            <div class="card-summary">
                                <?php echo $cardSummary?>
                            </div>
                            <div class="card-text">
                                <span class="author"><?php echo !empty($data['copyright']) ? $data['copyright'] : 'John Doe'?></span>
                                <span class="date"><?php 
                                    echo "- " . date_format( date_create( $data['date'] ), "d/m/Y") 
                                ?></span>
                                
                            </div>
                        </div>
                    </a>
                </div>
            <?php break;
            case 'type3-sm': ?>
                <div class="card type3 sm">
                    <div class="card-image" style=<?php echo "background-image:url(" . $data['url'] . ")"?>></div>
                    <a href=<?php echo "/post?date=". $data['date']?>>
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $data['title']?></h2>
                            <div class="card-text">
                                <span class="author"><?php echo !empty($data['copyright']) ? $data['copyright'] : 'John Doe'?></span>
                                <span class="date"><?php 
                                    echo "- " . date_format( date_create( $data['date'] ), "d/m/Y") 
                                ?></span>
                                
                            </div>
                        </div>
                    </a>
                </div>
            <?php break;
            default:
                break;
        } ?>
    <?php } ?>




