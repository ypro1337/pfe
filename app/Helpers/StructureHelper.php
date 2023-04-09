<?php

function recursiveStructureDropdown($structures, $prefix = '')
{
    $dropdown = '';

    foreach ($structures as $structure) {
        $dropdown .= '<option value="' . $structure->id . '">' . $prefix . $structure->name . '</option>';

        if (count($structure->children) > 0) {
            $dropdown .= recursiveStructureDropdown($structure->children, $prefix . $structure->name . '/');
        }
    }

    return $dropdown;
}


