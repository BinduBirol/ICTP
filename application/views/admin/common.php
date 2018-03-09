<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-windows"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><?=$title?></li>
                </ul>
                <h4><?=ucfirst($this->uri->segment(2))?></h4>
            </div>
        </div>
    </div>

    <div class="contentpanel">
        <div class="row">
            <div class="col-md-12">
                <?=$output ?>
            </div>            
        </div>        
    </div>
</div>