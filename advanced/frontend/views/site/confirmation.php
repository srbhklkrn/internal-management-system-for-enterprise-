<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Confirmation';

?>



<!--Intro-->
<section class="intro" >
       
        <div class="intro_item">

            <!-- Over -->
            <div class="over" data-opacity="0.4" data-color="#000"></div>
            <div class="into_back image_bck"  data-image="images/back3.jpg"></div>
            

            <div class="inside_intro_block">
                <div class="ins_int_item white_txt bordered_wht_border text-center">
                    <div class="simple_block simple_block_sml">
                        <h3>Thanks for choosing Berge Hotels</h3>
                        <h4>
                            You will receive a confirmation email shortly.
                        </h4>
                        <a href="<?php echo Url::to(['/site/index']);?>" class="btn btn-white"><i class="ti-angle-left"></i> Back to Home Page</a> 
                       
                    </div>
                </div>
            </div>

        </div>
  
</section>
<!-- Intro End -->
    






 <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
    <?php $this->endContent(); ?>