<?php

namespace App\Site\Event\View;

class Menu {

    function __construct() {
        global $e;

        $e->on('view.menuSite', function($menu) {
            $uri_atual = $_SERVER['REQUEST_URI'];

            $active = function($uri_menu) use ($uri_atual) {
//            if (substr($uri_atual, 0, strlen($uri_menu)) == $uri_menu) {
                if ($uri_atual == $uri_menu) {
                    return 'active';
                }
                return null;
            };

            $html = '<ul class="menuzord-menu">';
            foreach ($menu as $m) {
                $act = null;
                $url = isset($m['url']) ? $m['url'] : '#';
                if (!empty($m['sub'])) {
                    foreach ($m['sub'] as $s) {
                        $act .= $active($s['url']);
                    }
                } else {
                    $act .= $active($url);
                }

                $html.='<li class="' . $act . '">
          <a href="' . $url . '">';
                $html.= $m['desc'];
                if (!empty($m['sub'])) {
                    $html.= '<span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>';
                }
                $html.= '</a>';
                if (!empty($m['sub'])) {

                    $html.= '<ul class="treeview-menu">';
                    foreach ($m['sub'] as $s) {
                        $act = $active($s['url']);
                        $html.= '<li class="' . $act . '"><a href="' . $s['url'] . '">
                   <i class="fa fa-circle-o"></i>' . $s['desc'] . '</a></li>';
                    }
                    $html.= '</ul>';
                }
                $html.='</li>';
            }
            echo $html;
        });
    }

}
