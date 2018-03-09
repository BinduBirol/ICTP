<section>
    <div class="mainwrapper">
        <div class="leftpanel">
            <div class="media profile-left">
                <a class="pull-left profile-thumb" href="<?=$base_url?>admin/users/edit/<?=$this->session->userdata('user_id') ?>">
                    <img class="img-circle" src="<?=$base_url?>assets/upload/images/users/avater.png" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?=$this->session->userdata('name'); ?></h4>
                    <small class="text-muted"><?=$this->session->userdata('user_type'); ?></small>
                </div>
            </div>

            <!--<h5 class="leftpanel-title">Navigation</h5>-->
            <ul class="nav nav-pills nav-stacked">

                <li><a href="<?=base_url('home/content/home')?>"><i class="fa fa-fax"></i> <span>Home</span></a></li>
                <li><a href="<?=base_url('home/content/Scope')?>"><i class="fa fa-fax"></i> <span>Scope</span></a></li>
                <li><a href="<?=base_url('home/content/importent_dates')?>"><i class="fa fa-fax"></i> <span>Importent Dates</span></a></li>

                <li><a href="<?=base_url('home/content/accepted_papers')?>"><i class="fa fa-fax"></i> <span>Accepted Papers</span></a></li>
                <li><a href="<?=base_url('home/content/paper_submission')?>"><i class="fa fa-fax"></i> <span>Paper Submission</span></a></li>
                <li><a href="<?=base_url('home/content/tutorial1')?>"><i class="fa fa-fax"></i> <span>Tutorial 1</span></a></li>
                
                <li><a href="<?=base_url('home/content/tutorial2')?>"><i class="fa fa-fax"></i> <span>Tutorial 2</span></a></li>
                <li><a href="<?=base_url('home/content/tutorial3')?>"><i class="fa fa-fax"></i> <span>Tutorial 3</span></a></li>
                <li><a href="<?=base_url('home/content/tutorial4')?>"><i class="fa fa-fax"></i> <span>Tutorial 4</span></a></li>
                
                <li><a href="<?=base_url('home/content/preparation_guidelin')?>"><i class="fa fa-fax"></i> <span>Preparation Guideline</span></a></li>
                <li><a href="<?=base_url('home/content/registration')?>"><i class="fa fa-fax"></i> <span>Registration</span></a></li>
                <li><a href="<?=base_url('home/content/tutorial_registration')?>"><i class="fa fa-fax"></i> <span>Tutorial Registration</span></a></li>
                
                <li><a href="<?=base_url('home/content/venue')?>"><i class="fa fa-fax"></i> <span>Venue</span></a></li>
                <li><a href="<?=base_url('home/content/conference_committees')?>"><i class="fa fa-fax"></i> <span>Conference Committees</span></a></li>
                <li><a href="<?=base_url('home/content/program')?>"><i class="fa fa-fax"></i> <span>Program</span></a></li>
                
                <li><a href="<?=base_url('home/content/plenary')?>"><i class="fa fa-fax"></i> <span>Plenary</span></a></li>
                <li><a href="<?=base_url('home/content/keynote_speech')?>"><i class="fa fa-fax"></i> <span>Keynote Speech</span></a></li>
                <li><a href="<?=base_url('home/content/keynote_speech2')?>"><i class="fa fa-fax"></i> <span>Keynote Speech 2</span></a></li>
                
                <li><a href="<?=base_url('home/content/keynote_speech3')?>"><i class="fa fa-fax"></i> <span>Keynote Speech 3 </span></a></li>
                <li><a href="<?=base_url('home/content/keynote_speech4')?>"><i class="fa fa-fax"></i> <span>Keynote Speech 4</span></a></li>
                <li><a href="<?=base_url('home/content/invited_speech')?>"><i class="fa fa-fax"></i> <span>Invited Speech</span></a></li>
                
                <li><a href="<?=base_url('home/content/travel_info')?>"><i class="fa fa-fax"></i> <span>Travel Info</span></a></li>
                <li><a href="<?=base_url('home/content/awards')?>"><i class="fa fa-fax"></i> <span>Awards</span></a></li>
                <li><a href="<?=base_url('home/content/contact')?>"><i class="fa fa-fax"></i> <span>Contact</span></a></li>
                
                <li><a href="<?=base_url('home/content/Users')?>"><i class="fa fa-fax"></i> <span>Users</span></a></li>
                
            </ul>
        </div>