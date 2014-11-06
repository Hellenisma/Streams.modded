<?php
class TableClass {
 
    /**
     * create
     * This method return the table element <table...
     * @param   array(id, name, class)
     * @return  string
     */
    public function create($params = array()) {
        $t = '<table';
        $t .= (isset($params['id']))        ? " id='{$params['id']}'"                       : '';
        $t .= (isset($params['name']))      ? " name='{$params['name']}'"                   : '';
        $t .= (isset($params['class']))     ? " class='{$params['class']}'"                 : '';
        $t .= '>';
        return $t;
    }
 
    public function close() {
        $t = '</table>';
        return $t;
    }
    
    public function rowOpen($params = array()) {
        $t = '<tr';
        $t .= (isset($params['id']))        ? " id='{$params['id']}'"                       : '';
        $t .= (isset($params['class']))     ? " class='table row {$params['class']}'"       : " class='table row'";
        $t .= '>';
        return $t;
    }
    
    public function rowClose() {
        $t = '</tr>';
    }
    
    public function cell($params = array()) {
        $t = '<td';
        $t .= (isset($params['id']))        ? " id='{$params['id']}'"                       : '';
        $t .= (isset($params['class']))     ? " class='table cell {$params['class']}'"      : " class='table cell'";
        $t .= (isset($params['colspan']))   ? " colspan='{$params['colspan']}'"             : '';
        $t .= (isset($params['rowspan']))   ? " rowspan='{$params['rowspan']}'"             : '';
        $t .= (isset($params['width']))     ? " style='width:{$params['width']}px;'"        : '';
        $t .= '>';
        $t .= (isset($params['data']))      ? "{$params['data']}"                           : '';
        $t .= '</td>';
        return $t;
    }
    
    public function headingCell($params = array()) {
        $t = '<th';
        $t .= (isset($params['id']))        ? " id='{$params['id']}'"                           : '';
        $t .= (isset($params['class']))     ? " class='table headingCell {$params['class']}'"   : " class='table headingCell'";
        $t .= (isset($params['colspan']))   ? " colspan='{$params['colspan']}'"                 : '';
        $t .= (isset($params['rowspan']))   ? " rowspan='{$params['rowspan']}'"                 : '';
        $t .= (isset($params['width']))     ? " style='width:{$params['width']}px;'"            : '';
        $t .= '>';
        $t .= (isset($params['data']))      ? "{$params['data']}"                               : '';
        $t .= '</th>';
        return $t;
    }
}

    
    
            

?>