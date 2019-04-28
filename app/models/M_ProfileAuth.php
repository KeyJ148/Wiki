<?php


class M_ProfileAuth extends Model {

    public function getData(){
        $data['title'] = 'Профиль';
        $data['content_description'] = 'Мы рады снова вас видеть, ' . $_SESSION['login'] . '!';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $person = new ORM_Person();
        $person->db_login = $_SESSION['login'];
        $person->load();

        $role = new ORM_Role();
        $role->db_id = $person->db_role_id;
        $role->load();

        $name = 'Ваш профиль';
        $text = 'Вы вошли на сайт как '  . $_SESSION['login'] . '.<br>
                 Ваша категория прав: ' . $role->db_name;
        $content->addTopic($name, $text);

        $name = 'Выход';
        $unloginForm = new V_Button();
        $unloginForm->form_path = FORMS_PATH['unlogin'];
        $unloginForm->text = 'Выйти';
        $text = 'Чтобы разлогиниться с сайта, пожалуйста, нажмите кнопку ниже.' . $unloginForm->getText();
        $content->addTopic($name, $text);

        return $content->getData();
    }
}