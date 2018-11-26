<?php
$template = new Template(TEMPLATE_PATH.'layout/web/header.blade.php');
// config
$template->assign('native_language',NATIVE_LANGUAGE);
$template->assign('config.domain',getConfig('DOMAIN'));
$template->assign('config.webtitle',getConfig('WEBTITLE'));
$template->assign('config.publisher',getConfig('PUBLISHER'));
$template->assign('config.author',getConfig('AUTHOR'));
$template->assign('config.copyright',getConfig('COPYRIGHT'));
$template->assign('config.robots',getConfig('ROBOTS'));
// sprache
$template->assign('web.to_start',getRoutes('web.to_start'));
$template->assign('menu.start',getLang('menu.start'));
$template->assign('menu.go_to_start',getLang('menu.go_to_start'));
// wartungsmodus
$wartung = '';
if (getConfig('WARTUNG') == 1) {
    if (isAdmin() == true) {
        $wartung = '<div class="bg-danger text-white text-center py-1 wartung">
                        <div class="container">'.getLang('maintenance.under_construction').'</div>
                    </div>';
    }
}
$template->assign('wartungsmodus',$wartung);
// anmeldung
$log = '';
if (empty($_SESSION['id'])) {
    $tpl = new Template(TEMPLATE_PATH.'anmeldung/logout.blade.php');
    $tpl->assign('web.to_signup',getRoutes('web.to_signup'));
    $tpl->assign('menu.signup',getLang('menu.signup'));
    $tpl->assign('menu.go_to_signup',getLang('menu.go_to_signup'));
    $tpl->assign('web.to_login',getRoutes('web.to_login'));
    $tpl->assign('menu.login',getLang('menu.login'));
    $tpl->assign('menu.go_to_login',getLang('menu.go_to_login'));
    $log .= $tpl->show();
} else {
    $tpl = new Template(TEMPLATE_PATH.'anmeldung/login.blade.php');
    $tpl->assign('web.to_account',getRoutes('web.to_account'));
    $tpl->assign('menu.account',getLang('menu.account'));
    $tpl->assign('menu.go_to_account',getLang('menu.go_to_account'));
    if (isAdmin() == true) {
        $wcp = '';
        $tpl2 = new Template(TEMPLATE_PATH.'anmeldung/wcp.blade.php');
        $tpl2->assign('path','/admin');
        $tpl2->assign('menu.wcp',getLang('menu.admin_wcp'));
        $tpl2->assign('menu.weiter_zu_wcp',getLang('menu.weiter_admin_wcp'));
        $wcp .= $tpl2->show();
    } else if (isMod() == true) {
        $wcp = '';
        $tpl2 = new Template(TEMPLATE_PATH.'anmeldung/wcp.blade.php');
        $tpl2->assign('path','/mod');
        $tpl2->assign('menu.wcp',getLang('menu.mod_wcp'));
        $tpl2->assign('menu.weiter_zu_wcp',getLang('menu.weiter_mod_wcp'));
        $wcp .= $tpl2->show();
    }
    $tpl->assign('web.to_logout',getRoutes('web.to_logout'));
    $tpl->assign('menu.logout',getLang('menu.logout'));
    $tpl->assign('menu.go_to_logout',getLang('menu.go_to_logout'));
    $log .= $tpl->show();
}
$template->assign('log',$log);
$template->assign('wcp',$wcp);
// ausgabe
echo $template->show();