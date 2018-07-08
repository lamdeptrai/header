<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/8/2018
 * Time: 9:21 AM
 */


class TNCP_Header extends TNCP_ToanNang{

    protected $options = [
        'hotline' => '0932132103',
        'blogs' => [
        ]
    ];
    function __construct()
    {
        parent::__construct(include __DIR__.'/setting.php', __FILE__);
        parent::setOptions($this->options);
    }

    /*Add html to Render*/
    public function render(){ ?>

        <button onclick="topFunction()" id="myBtn" class="hvr-hang" title="Trở về top nào !"><i class="fas fa-chevron-up"></i></button>
        <div id="header_toannang">
            <div class="header_toannang_group">
                <div class="header_toannang-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-xs-10 header_toannang_flex_mb">
                                <!--MENU MOBILE-->
                                <div id="page" class="v-menu-mobile">
                                    <div class="header menu-toggle">
                                        <a class="" href="#menu"><span></span></a>
                                    </div>
                                    <nav id="menu">
                                        <?php if(wp_is_mobile()){
                                            wp_nav_menu(array('menu' => 'main-menu'));
                                        }?>
                                    </nav>
                                </div>

                                <div class="logo">
                                    <?php az_box_logo_primary()?>
                                </div>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <!--MENU DESKTOP-->
                                <?php if(!wp_is_mobile()) :?>
                                    <?php $menus = wp_get_nav_menu_items('main-menu');?>
                                    <?php if(!empty($menus)): ?>
                                        <div class="v-menu-right">
                                            <div class="menu-toannang">
                                                <?php  $count = 0;$submenu = false;
                                                foreach ($menus as $menu): ?>
                                                    <?php if ( !$menu->menu_item_parent ):  $parent_id = $menu->ID; $object_id = $menu->object_id?>
                                                        <div class="menu-toannang-dropdown"><a href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a>
                                                    <?php endif; ?>
                                                    <?php if ( $parent_id == $menu->menu_item_parent ): ?>
                                                        <?php if ( !$submenu ): $submenu = true; ?>
                                                            <div class="menu-toannang-group">
                                                                <?php
                                                                    $cat = get_category($object_id);
                                                                ?>
                                                                <h4><?php echo $cat->name; ?></h4>
                                                                <div class="row margin-5">
                                                                    <div class="col-md-4 padding-5">
                                                                        <div class="menu-toannang-group-details">
                                                                            <?php echo $cat->description;?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8 padding-5">
                                                                        <div class="menu-toannang-group-list">
                                                                            <ul>
                                                                        <?php endif; ?>
                                                                                <li class="col-md-6"><a href="<?php echo $menu->url; ?>"><?php echo $menu->title; ?></a></li>
                                                                        <?php if ( $menus[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php $submenu = false; endif; ?>
                                                    <?php endif; ?>
                                                    <?php if ( $menus[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
                                                        </div><!-- li -->
                                                        <?php $submenu = false; endif; ?>
                                                    <?php $count++; endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="header_toannang_banner wow bounceInRight" data-wow-duration="1.5s">
                    <img src="<?php echo $this->getPath()?>/images/maytinh.png">
                </div>
                <div class="header_toannang-slogon">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h2><?php echo get_field('tieu_de_banner','option')?></h2>
                                <?php $dichvu = get_field('danh_sach_cac_dich_vu','option')?>
                                <ul>
                                    <?php if(!empty($dichvu)): foreach ($dichvu as $item) :?>
                                        <li><a href="<?php echo $item['duong_dan']?>"><?php echo $item['ten_dich_vu']?></a></li>
                                    <?php endforeach; endif;?>

                                </ul>
                                <div class="header_toannang-slogon-cmt">
                                    <?php echo get_field('cam_ket','option'); ?>
                                </div>
                                <div class="header_toannang-btn">
                                    <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Yêu cầu tư vấn</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center" style="text-transform: uppercase"><strong>Yêu cầu tư vấn</strong></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]')?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">x</button>
                    </div>
                </div>

            </div>
        </div>
    <?php }
}


