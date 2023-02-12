<?require_once($_SERVER['DOCUMENT_ROOT']."/classes/Articles.php")?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <?
        $s = new \LabSales\Articles;
        $arResult = $s->getData();
        if(!empty($arResult)):
        ?>
        <div class="wrapper mb-5 mt-5">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?foreach($arResult['categories'] as $key=>$category):?>
                            <?if(isset($category['articles'])):?>
                                <a class="nav-item nav-link <?=($key == 0)? 'active': ''?>" 
                                    id="nav-<?=$category['category_id']?>-tab" 
                                    data-toggle="tab" 
                                    href="#nav-<?=$category['category_id']?>" 
                                    role="tab" 
                                    aria-controls="nav-<?=$category['category_id']?>" 
                                    aria-selected="<?=($key == 0)? 'true': 'false'?>"><?=$category['name']?></a>
                            <?endif;?>
                        <?endforeach;?>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <?foreach($arResult['categories'] as $key=>$category):?>
                        <?if(isset($category['articles'])):?>
                            <div class="tab-pane fade <?=($key == 0)? 'show active': ''?>" id="nav-<?=$category['category_id']?>" role="tabpanel">
                                <div class="row mb-4">
                                    <?foreach($category['articles'] as $article):?>
                                    <div class="col-12 mt-3 mb-3">
                                        <h2><?=$article['name']?></h2>
                                        <p><i><?=$article['date']?></i></p>
                                        <p><?=$article['text']?></p>
                                    </div>
                                    <div class="col-12"><hr></div>
                                    <?endforeach;?>
                                </div>
                            </div>
                        <?endif;?>
                    <?endforeach;?>
                </div>
            </div>
        </div>
        <?endif?>
    </body>
</html>        