<?php
/**
 * @link http://www.writesdown.com/
 * @author Agiel K. Saputra <13nightevil@gmail.com>
 * @copyright Copyright (c) 2015 WritesDown
 * @license http://www.writesdown.com/license/
 */

use common\models\Option;
use common\models\Taxonomy;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $posts common\models\Post[] */
/* @var $tags common\models\Term[] */
/* @var $pages yii\data\Pagination */

$this->title = Html::encode(Option::get('sitetitle'));
?>
   <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
 

   


                            <!-- [ Main Content ] start -->
                            <div class="row">
                             
                                <!--[ year  sales section ] end-->
                                <div class="col-md-6 col-xl-6">
                                    <div class="card daily-sales">
                                                                            <a href="<?=Url::base(true).'/delicate/create'?>">

                                        <div class="card-block">
                                            <h6 class="mb-4"> Delicates</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-12">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="fa fa-plus"></i> &nbsp;Add Delicates</h3>
                                                </div>

                                                
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                      </a>
                                    </div>
                                </div>
                                <!--[ daily sales section ] end-->
                                <!--[ Monthly  sales section ] starts-->
                                <div class="col-md-6 col-xl-6">
                                    <div class="card Monthly-sales">
                                      <a href="<?=Url::base(true).'/delicate/index'?>">

                                        <div class="card-block">
                                            <h6 class="mb-4">Candidate</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="fas fa-list text-c-red f-30 m-r-10"></i>Delicate List</h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <p class="m-b-0"><?=count($modelDelicates)?></p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                      </a>
                                    </div>
                                </div>
                                <!--[ Monthly  sales section ] end-->
                                <!--[ year  sales section ] starts-->
                               <!--  <div class="col-md-12 col-xl-4">
                                    <div class="card yearly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Survey</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ 8.638.32</h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <p class="m-b-0">80%</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!--[ Recent Users ] start-->
                                <div class="col-xl-12 col-md-12">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Recent Delicates</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                       <?php
                                                       foreach ($modelDelicates as  $value) { ?>
                                                          <tr class="unread">
                                                            <td>
                                                                <?php
                                                                if ($value->photo) { ?>
                                                                     <img class="rounded-circle" style="width:40px;" src="<?=Url::base(true).'/public/images/'?>" alt="activity-user">
                                                                <?php }else { ?>
                                                                     <img class="rounded-circle" style="width:40px;" src="<?=Url::base(true).'/public/images'?>/user/avatar-2.jpg" alt="activity-user">

                                                               <?php }
                                                                ?>
                                                               </td>
                                                               <td>
                                                                   <h6 class="mb-1"><?=$modelDelicate->ncc->title?></h6>
                                                               </td>
                                                            <td>
                                                                <h6 class="mb-1"><?=$value->name;?></h6>
                                                                <p class="m-0"><?=date('Y-m-d');?></p>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i><?=date('Y-m-d');?></h6>
                                                            </td>
                                                            <td><a href="#!" class="label theme-bg2 text-white f-12">Delete</a><a href="#!" class="label theme-bg text-white f-12">Update</a></td>
                                                        </tr>
                                                      <?php } ?>
                                                       
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Recent Users ] end-->

                          
                           

                            </div>
                            <!-- [ Main Content ] end -->
                       