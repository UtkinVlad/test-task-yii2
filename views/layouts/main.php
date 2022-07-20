<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
    <html lang="ru">
       <head>
           <?= Html::csrfMetaTags() ?>
       </head>
        <body class="home">
            <?php $this->beginBody() ?>
            <div class="wrapper">
                <div class="content">
                    <?php echo $content; ?>
                </div>
            </div>
            <?php $this->endBody() ?>
        </body>
  </html>
<?php $this->endPage() ?>
