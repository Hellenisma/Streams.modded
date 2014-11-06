<?php

class Menu {
    
     public function create($params = array()) {
        $m = '<ul';
        $m .= (isset($params['id']))        ? " id='{$params['id']}'"                       : '';
        $m .= (isset($params['class']))     ? " class='{$params['class']}'"                 : " class='main-menu'";
        $m .= '>';
        return $m;
     }
     
     public function close() {
        $m = '</ul>';
        return $m;
    }
    
    //menu element group title
    public function groupTitle($params = array()) {
        $m = '<div';
        $m .= (isset($params['id']))        ? " id='{$params['id']}'"                       : '';
        $m .= (isset($params['class']))     ? " class='group-title {$params['class']}'"     : " class='group-title'";
        $m .= '>';
        $m .= (isset($params['data']))      ? $params['data']                               : '';
        $m .= '</div>';
        return $m;
    }
    
    //menu element
    public function menuItem($params = array()) {
        
        //TODO: Piekļuvju pārbaude un reaģēšana
        //TODO: Iespēja norādīt debug režīmu, kur tiek attēlotas nepieciešamās piekļuves, lai redzētu elementu
        
        $m = '<li';
        $m .= (isset($params['id']))        ? " id='{$params['id']}'"                   : '';
        $m .= (isset($params['class']))     ? " class='menu-item {$params['class']}'"   : " class='menu-item'";
        $m .= '>';
        
        $m .= '<a';
        $m .= (isset($params['target']))    ? " href='{$params['target']}'"             : '';
        $m .= '>';
        $m .= (isset($params['data']))      ? $params['data']                           : '';
        $m .= '</a>';
        
        $m .= '</li>';
        return $m;
    }
    
}

