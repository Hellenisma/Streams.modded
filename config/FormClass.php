<?php
/**
 * Form Class to generate forms on the fly with less markup
 * @author Andre Honsberg -> www.AndreHonsberg.com
 * avots: http://www.andrehonsberg.com/article/php-form-class
 */
class FormClass {
 
    /**
     * create
     * This method return the form element <form...
     * @param   array(id, name, class, onsubmit, method, action)
     * @return  string
     */
    public function create($params = array()) {
        $o = '<form';
        $o .= (isset($params['id']))        ? " id='{$params['id']}'"                       : '';
        $o .= (isset($params['name']))      ? " name='{$params['name']}'"                   : '';
        $o .= (isset($params['class']))     ? " class='input-form {$params['class']}'"      : " class='input-form'";
        $o .= (isset($params['onsubmit']))  ? " onsubmit='{$params['onsubmit']}'"           : '';
        $o .= (isset($params['method']))    ? " method='{$params['method']}'"               : '';
        $o .= (isset($params['action']))    ? " action='{$params['action']}'"               : '';
        $o .= (isset($params['width']))     ? " style='width:{$params['width']}px;'"        : '';
        $o .= '>';
        
        return $o;
    }
 
    public function close() {
        $o = '</form>';
        return $o;
    }
    
    public function token($token)
    {
        $o =    '<input type="hidden" name="token"';
        $o .=   "value='{$token}'";
        $o .=   '/>';
        
        return $o;
    }
 
    /**
     * label
     * Method creates label element (added)
     * @param array(id, class, for, label)
     * @return string
     */
    public function label($params = array()) {
        $o = '<label';
        $o .= (isset($params['class']))     ? " class='form-input label {$params['class']}'"    : " class='form-input label'";
        $o .= (isset($params['for']))       ? " for='{$params['for']}'"                         : '';
        $o .= '>';
        $o .= (isset($params['label']))     ? "{$params['label']}"                              : '';
        $o .= '</label>';
        return $o;
    }
    
    /**
     * text
     * This method returns a input text element.
     * @param   array(id, name, class, onclick, value, length, width, disable)
     * @return  string
     */
    public function text($params = array()) {
        $o = '<input type="text"';
        $o .= (isset($params['id']))        ? " id='{$params['id']}'"                       : '';
        $o .= (isset($params['name']))      ? " name='{$params['name']}'"                   : '';
        $o .= (isset($params['class']))     ? " class='form-input text {$params['class']}'" : " class='form-input text'";
        $o .= (isset($params['onclick']))   ? " onclick='{$params['onclick']}'"             : '';
        $o .= (isset($params['onkeypress']))? " onkeypress='{$params['onkeypress']}'"       : '';
        $o .= (isset($params['value']))     ? ' value="' . $params['value'] . '"'           : '';
        $o .= (isset($params['length']))    ? " maxlength='{$params['length']}'"            : '';
        $o .= (isset($params['width']))     ? " style='width:{$params['width']}px;'"        : '';
        $o .= (isset($params['disabled']))  ? " disabled='{$params['disabled']}'"           : '';
        $o .= ' />';
        return $o;
    }    
    
 
    /**
     * textBox
     * This method creates a textarea element
     * @param   array(id, name, class, onclick, columns, rows, disabled)
     * @return  string
     */
    public function textBox($params = array()) {
        $o = '<textarea';
        $o .= (isset($params['id']))        ? " id='{$params['id']}'"                           : '';
        $o .= (isset($params['name']))      ? " name='{$params['name']}'"                       : '';
        $o .= (isset($params['class']))     ? " class='form-input textbox {$params['class']}'"  : " class='form-input textbox'";
        $o .= (isset($params['onclick']))   ? " onclick='{$params['onclick']}'"                 : '';
        $o .= (isset($params['columns']))   ? " cols='{$params['columns']}'"                    : '';
        $o .= (isset($params['rows']))      ? " rows='{$params['rows']}'"                       : '';
        $o .= (isset($params['disabled']))  ? " disabled='{$params['disabled']}'"               : '';
        $o .= '>';
        $o .= (isset($params['value']))     ? $params['value']                                  : '';
        $o .= '</textarea>';
        return $o;
    }
 
    /**
     * select
     * This method returns a select html element.
     * It can be given a param called value which then will be preselected
     * data has to be array(k=>v)
     * @param   array(id, name, class, onclick, disabled)
     * @return  string
     */
    public function select($params = array()) {
        $o = '<select';
        $o .= (isset($params['id']))        ? " id='{$params['id']}'"                           : '';
        $o .= (isset($params['name']))      ? " name='{$params['name']}'"                       : '';
        $o .= (isset($params['class']))     ? " class='form-input select {$params['class']}'"   : " class='form-input select'";
        $o .= (isset($params['onclick']))   ? " onclick='{$params['onclick']}'"                 : '';
        $o .= (isset($params['width']))     ? " style='width:{$params['width']}px;'"            : '';
        $o .= (isset($params['disabled']))  ? " disabled='{$params['disabled']}'"               : '';
        $o .= '>';
        $o .= '<option value="0">Select</option>';
        if (isset($params['data']) && is_array($params['data'])) {
            foreach ($params['data'] as $k => $v) {
                if (isset($params['value']) && $params['value'] == $k) {
                    $o .= "<option value='{$k}' selected='selected'>{$v}</option>";
                } else {
                    $o .= "<option value='{$k}'>{$v}</option>";
                }
            }
        }
        $o .= '</select>';
        return $o;
    }
 
    /**
     * checkboxMulti
     * This method returns multiple checkbox elements in order given in an array
     * For checking of checkbox pass checked
     * Each checkbox should look like array(0=>array('id'=>'1', 'name'=>'cb[]', 'value'=>'x', 'label'=>'label_text' ))
     * @param   array(array(id, name, value, class, checked, disabled))
     * @return  string
     */
    public function checkboxMulti($params = array()) {
        $o = '';
        if (!empty($params)) {
            $x = 0;
            foreach ($params as $k => $v) {
                $v['id'] = (isset($v['id']))        ? $v['id']                                          : "cb_id_{$x}_".rand(1000,9999);               
                $o .= '<input type="checkbox"';
                $o .= (isset($v['id']))             ? " id='{$v['id']}'"                                : '';
                $o .= (isset($v['name']))           ? " name='{$v['name']}'"                            : '';
                $o .= (isset($v['value']))          ? " value='{$v['value']}'"                          : '';
                $o .= (isset($v['class']))          ? " class='form-input checkbox {$v['class']}'" : " class='form-input checkbox'";
                $o .= (isset($v['checked']))        ? " checked='checked'"                              : '';
                $o .= (isset($v['disabled']))       ? " disabled='{$v['disabled']}'"                : '';
                $o .= ' /> ';
                $o .= (isset($v['label']))          ? "<label for='{$v['id']}'>{$v['label']}</label> "  : '';
                $x++;
            }
        }
        return $o;
    }
 
    /**
     * radioMulti
     * This method returns radio elements in order given in an array
     * For selection pass checked
     * Each radio should look like array(0=>array('id'=>'1', 'name'=>'rd[]', 'value'=>'x', 'label'=>'label_text' ))
     * @param   array(array(id, name, value, class, checked, disabled, label))
     * @return  string
     */
    public function radioMulti($params = array()) {
        $o = '';
        if (!empty($params)) {
            $x = 0;
            foreach ($params as $k => $v) {
                $v['id'] = (isset($v['id']))        ? $v['id']                                          : "rd_id_{$x}_".rand(1000,9999);               
                $o .= '<input type="radio"';
                $o .= (isset($v['id']))             ? " id='{$v['id']}'"                                : '';
                $o .= (isset($v['name']))           ? " name='{$v['name']}'"                            : '';
                $o .= (isset($v['value']))          ? " value='{$v['value']}'"                          : '';
                $o .= (isset($v['class']))          ? " class='form-input radio {$v['class']}'"     : " class='form-input radio'";
                $o .= (isset($v['checked']))        ? " checked='checked'"                              : '';
                $o .= (isset($v['disabled']))       ? " disabled='{$v['disabled']}'"                : '';
                $o .= ' /> ';
                $o .= (isset($v['label']))          ? "<label for='{$v['id']}'>{$v['label']}</label> "  : '';
                $x++;
            }
        }
        return $o;
    }
 
    /**
     * This method returns a button element given the params for settings
     * @param   array(id, name, class, onclick, value, disabled)
     * @return  string
     */
    public function button($params = array()) {
        $o = '<input type="button"';
        $o .= (isset($params['id']))        ? " id='{$params['id']}'"                           : '';
        $o .= (isset($params['name']))      ? " name='{$params['name']}'"                       : '';
        $o .= (isset($params['class']))     ? " class='form-input button {$params['class']}'"   : " class='form-input button'";
        $o .= (isset($params['onclick']))   ? " onclick='{$params['onclick']}'"                 : '';
        $o .= (isset($params['value']))     ? " value='{$params['value']}'"                     : '';
        $o .= (isset($params['disabled']))  ? " disabled='{$params['disabled']}'"               : '';
        $o .= ' />';
        return $o;
    }
 
    /**
     * This method returns a submit button element given the params for settings
     * @param   array(id, name, class, onclick, value, disabled)
     * @return  string
     */
    public function submit($params = array()) {
        $o = '<input type="submit"';
        $o .= (isset($params['id']))        ? " id='{$params['id']}'"                           : '';
        $o .= (isset($params['name']))      ? " name='{$params['name']}'"                       : '';
        $o .= (isset($params['class']))     ? " class='form-input button {$params['class']}'"   : " class='form-input submit'";
        $o .= (isset($params['onclick']))   ? " onclick='{$params['onclick']}'"                 : '';
        $o .= (isset($params['value']))     ? " value='{$params['value']}'"                     : '';
        $o .= (isset($params['disabled']))  ? " disabled='{$params['disabled']}'"               : '';
        $o .= ' />';
        return $o;
    }
 
    /**
     * This method returns a hidden input elements given its params
     * @param   array(id, name, class, value)
     * @return  string
     */
    public function hidden($params = array()) {
        $o = '<input type="hidden"';
        $o .= (isset($params['id']))        ? " id='{$params['id']}'"                           : '';
        $o .= (isset($params['name']))      ? " name='{$params['name']}'"                       : '';
        $o .= (isset($params['class']))     ? " class='form-input hidden {$params['class']}'"   : " class='form-input hidden'";
        $o .= (isset($params['value']))     ? " value='{$params['value']}'"                     : '';
        $o .= ' />';       
        return $o;
    }
}
 
 
?>