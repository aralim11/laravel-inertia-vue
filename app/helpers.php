<?php

## __showPermissionsName view
if (!function_exists('__showPermissionsName')) {
    function __showPermissionsName($data)
    {
        $permissionsName = '';
        if (!empty($data)) {
            foreach ($data as $value) {
                $permissionsName .= '<span class="badge bg-blue-lt">' . $value->name . '</span>&nbsp;';
            }
        }

        return $permissionsName;
    }
}
