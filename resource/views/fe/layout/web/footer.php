<?php
$template = new Template(TEMPLATE_PATH.'layout/web/footer.blade.php');
$template->assign('web.to_contact',getRoutes('web.to_contact'));
$template->assign('menu.contact',getLang('menu.contact'));
$template->assign('menu.go_to_contact',getLang('menu.go_to_contact'));
$template->assign('web.to_help',getRoutes('web.to_help'));
$template->assign('menu.help',getLang('menu.help'));
$template->assign('menu.go_to_help',getLang('menu.go_to_help'));
$template->assign('web.to_privacy',getRoutes('web.to_privacy'));
$template->assign('menu.privacy',getLang('menu.privacy'));
$template->assign('menu.go_to_privacy',getLang('menu.go_to_privacy'));
$template->assign('web.to_impressum',getRoutes('web.to_impressum'));
$template->assign('menu.impressum',getLang('menu.impressum'));
$template->assign('menu.go_to_impressum',getLang('menu.go_to_impressum'));
$template->assign('config.software','Nordhammer');
$template->assign('config.version','pre-alpha 2.0.0');
if (isset($_SESSION['msg'])) {
    $msg = '<section id="hint" class="alert alert-'.$_SESSION['hint'].' alert-dismissible">
                <div class="container text-center">
                    <span id="text">'.$_SESSION['msg'].'</span>
                </div>
            </section>';
}
unset($_SESSION['hint']);
unset($_SESSION['msg']);
$template->assign('msg',$msg);
include_once 'useronline.php';
echo $template->show();