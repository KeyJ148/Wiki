<?php

class V_UserList extends ViewSafe {

    public $users, $display_change_form, $roles;

    public function getText(){
        $text = '';

        for ($i = 0; $i < count($this->users); $i++) {
            if (!$this->display_change_form){
                $text .= 'Логин: '. $this->users[$i]['login'] .' ('. $this->users[$i]['role'] .')<br>';
            } else{
                $text .='
                <form action="'. FORMS_PATH['change_role'] .'" method="POST">
                <span class="form">Логин: '. $this->users[$i]['login'] .'</span>
                <input type="hidden" name="id" value="'. $this->users[$i]['id'] .'">
                <select class="button" name="role">
                <option>'. $this->users[$i]['role'] .'</option>';

                for ($role_it = 0; $role_it < count($this->roles); $role_it++) {
                    if ($this->users[$i]['role'] !== $this->roles[$role_it]['name']) {
                        $text .= '<option>' . $this->roles[$role_it]['name'] . '</option>';
                    }
                }

                $text .='    
                </select>
                <input class="button mini-button" type="submit" value="Сохранить">
                </form><br>';
            }
        }

        return $text;
    }
}
?>
