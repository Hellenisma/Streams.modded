<?php
function gameIcon ($gameName)
{   
    switch ($gameName) {
        case 'StarCraft II: Heart of the Swarm':
            $iconName = 'noico.png';
            break;

        default:
            $iconName = 'noico.png';
            break;
    }
    
    return $iconName;
}
?>