<?php

// Check if the function exists before declaring it
if (!function_exists('buildSubfolders')) {
    function buildSubfolders($folders, $parentName) {
        $html = '';
        foreach ($folders as $folder) {
            if ($folder->parent_name === $parentName) {
                $html .= '<li><a href="#" class="folder-link" data-folder-name="'.$folder->name.'">
                <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.0625 1.3125C2.36631 1.3125 1.69863 1.58906 1.20634 2.08134C0.714062 2.57363 0.4375 3.24131 0.4375 3.9375V9.625C0.4375 10.3212 0.714062 10.9889 1.20634 11.4812C1.69863 11.9734 2.36631 12.25 3.0625 12.25H10.9375C11.6337 12.25 12.3014 11.9734 12.7937 11.4812C13.2859 10.9889 13.5625 10.3212 13.5625 9.625V5.25C13.5625 4.55381 13.2859 3.88613 12.7937 3.39384C12.3014 2.90156 11.6337 2.625 10.9375 2.625H6.5625L6.01913 2.08162C5.77532 1.83775 5.48586 1.6443 5.16727 1.51233C4.84868 1.38036 4.50721 1.31246 4.16237 1.3125H3.0625ZM4.15625 5.6875C3.9822 5.6875 3.81528 5.75664 3.69221 5.87971C3.56914 6.00278 3.5 6.1697 3.5 6.34375C3.5 6.5178 3.56914 6.68472 3.69221 6.80779C3.81528 6.93086 3.9822 7 4.15625 7H9.84375C10.0178 7 10.1847 6.93086 10.3078 6.80779C10.4309 6.68472 10.5 6.5178 10.5 6.34375C10.5 6.1697 10.4309 6.00278 10.3078 5.87971C10.1847 5.75664 10.0178 5.6875 9.84375 5.6875H4.15625Z" fill="#CEFFA8"/>
                <path d="M16.3335 6.33301L18.0002 7.99967L19.6668 6.33301H16.3335Z" fill="#CEFFA8"/>
                </svg> '.$folder->name.'</a>';
                // Recursively build subfolders for the current folder
                $html .= '<ul class="dropdown-menu">'.buildSubfolders($folders, $folder->name).'</ul>';
                $html .= '</li>';
            }
        }
        return $html;
    }
}

?>