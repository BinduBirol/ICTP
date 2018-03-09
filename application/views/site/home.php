<div class="container wraper">
    <div class="content-spacing margin-top-bottom">
        <div class="row">            
            <?php $this->load->view('site/theme/menu') ?>

            <div class="col-sm-6 content-spacing">
                <div class="midd-bar">
                    <div class="recent-post-box clearfix">                        
                        
                        <h1> <?=$info->title?> </h1>                        
                        <?= $info->description ?>
                        
                    </div>                    
                </div>
            </div>            
            
            <?php $this->load->view('site/theme/sidebar') ?>
        </div>
    </div>
</div>