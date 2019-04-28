<?php

class C_Members extends DefaultPageController {

    function action_index() {
        $data = (new M_Members())->getData();
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->content_description = $data['content_description'];
        $this->active_menu = 2;

        $template = $this->getTemplateMain();
        $template->head->addCSS(CSS_URL . 'parts/input.css');
        $template->display();
    }

    function action_change(){
        $id = $_POST['id'];
        $role = $_POST['role'];

        if ($id == null || $role == null){
            $this->redirect(M_Error::_ERROR_FIELD_EMPTY, 0);
            return;
        }

        if (!isset($_SESSION['login'])){
            $this->redirect(M_Error::_ERROR_NOT_LOGGED_IN, 0);
            return;
        }

        $result = (new M_Members())->change_role($_SESSION['login'], $id, $role);
        $this->redirect($result);
    }

    private function redirect($result){
        if ($result === true) header('Location: ' . M_Members::_REDIRECT);
        else header('Location: ' . M_Members::_REDIRECT . '?error=' . $result);
    }
}