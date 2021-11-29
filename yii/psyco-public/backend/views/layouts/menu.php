<?php 

use yii\helpers\Url;
use common\widgets\MenuAdminLte;

?> 
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                

    <?=MenuAdminLte::widget(
    [
            
            // ['label' => 'Dashboard', 'level' => 1, 'url' => ['/site/index'], 'icon' => 'fas fa-tachometer-alt', 'children' => []],

            // ['label' => 'My Profile', 'level' => 1, 'url' => ['/profile/view'], 'icon' => 'fas fa-user', 'children' => []],

            ['label' => 'All Candidate', 'level' => 1, 'url' => ['/candidate/index'], 'icon' => 'fas fa-users', 'children' => []],

            ['label' => 'View All Result', 'level' => 1, 'url' => ['/result/index'], 'icon' => 'fas fa-list', 'children' => []],

            ['label' => 'Setting', 'level' => 1, 'url' => ['/setting/index'], 'icon' => 'fas fa-cog', 'children' => []],

            ['label' => 'Change Password', 'level' => 1, 'url' => ['/candidate/change-password'], 'icon' => 'fas fa-unlock-alt', 'children' => []],

            ['label' => 'Logout', 'level' => 1, 'url' => ['/site/logout'], ['data-method' => 'post'], 'icon' => 'fas fa-times', 'children' => []],

            // ['label' => \Yii::t('app', 'Log Out'), 'level' => 1, 'url' => ['/site/logout'], ['data-method' => 'post'], 'icon' => $dirAssests.'/images/svg-icon/logout.svg'],
            
            
            // ['label' => 'EXAMPLES', 'level' => 0],
            
            // ['label' => 'Example', 'level' => 2 , 'icon' => 'fas fa-th', 'children' => [
            //     ['label' => 'Example 1', 'url' => ['/account/invoice'], 'icon' => 'far fa-circle'],
            //     ['label' => 'Example 2', 'url' => ['/account/receipt'], 'icon' => 'far fa-circle'],
                
            
            // ]],
        ]
    
    )?>

                    
                    
                    
<br /><br /><br /><br /><br /><br />
                                  
    </ul>
</nav>