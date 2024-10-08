<?php

if (!function_exists('buildMenu')) {
    function buildMenu($folders, $parentName = null) {
        $html = '';
        foreach ($folders as $folder) {
            if ($folder->parent_name == $parentName) {
                $html .= '<li class="dropdown">';
                $html .= '<a class="dropdown-toggle" aria-expanded="false">'.$folder->name.'<span class="caret"></span></a>';
                $subMenu = buildMenu($folders, $folder->path);
                if ($subMenu) {
                    $html .= '<ul class="dropdown-menu">' . $subMenu . '</ul>';
                }
                $html .= '</li>';
            }
        }
        return $html;
    }
}
