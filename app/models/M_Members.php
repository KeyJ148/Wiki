<?php


class M_Members extends Model {

    const _REDIRECT = '/members/';

    public function getData(){
        $data['title'] = 'Участники';
        $data['content_description'] = 'На данной странице вы можете посмотреть список пользователей системы и редактировать их права';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $name = 'Пользователи';
        $userList = new V_UserList();
        $userList->users = $this->getUserList();
        $userList->roles = $this->getRoles();
        if (isset($_SESSION['login'])){
            $person = new ORM_Person();
            $person->db_login = $_SESSION['login'];
            $person->load();

            $role = new ORM_Role();
            $role->db_id = $person->db_role_id;
            $role->load();

            if ($role->db_change_permissions) $userList->display_change_form = true;
        } else {
            $userList->display_change_form = false;
        }
        $text = $userList->getText();
        $content->addTopic($name, $text);

        return $content->getData();
    }

    private function getUserList(){
        $query = new ORM_Person();
        $users_orm = $query->loadAll();

        $users = array();
        for ($i = 0; $i < count($users_orm); $i++){
            $users[$i]['id'] = $users_orm[$i]->db_id;
            $users[$i]['login'] = $users_orm[$i]->db_login;

            $role = new ORM_Role();
            $role->db_id = $users_orm[$i]->db_role_id;
            $role->load();

            $users[$i]['role'] = $role->db_name;
        }

        return $users;
    }

    private function getRoles(){
        $query = new ORM_Role();
        $roles_orm = $query->loadAll();

        $roles = array();
        for ($i = 0; $i < count($roles_orm); $i++){
            $roles[$i]['name'] = $roles_orm[$i]->db_name;
            $roles[$i]['add_pages'] = $roles_orm[$i]->db_add_pages;
            $roles[$i]['change_pages'] = $roles_orm[$i]->db_change_pages;
            $roles[$i]['delete_pages'] = $roles_orm[$i]->db_delete_pages;
            $roles[$i]['change_permissions'] = $roles_orm[$i]->db_change_permissions;
        }

        return $roles;
    }

    public function change_role($login, $id, $new_role_name){
        $person = new ORM_Person();
        $person->db_login = $login;
        $person->load();

        $role = new ORM_Role();
        $role->db_id = $person->db_role_id;
        $role->load();

        if (!$role->db_change_permissions) return M_Error::_ERROR_NOT_PERMISSION;

        if ($id === $person->db_id) return M_Error::_ERROR_CHANGE_ROLE_YOURSELF;

        $new_role = new ORM_Role();
        $new_role->db_name = $new_role_name;
        $result = $new_role->load();

        if (!$result) return M_Error::_ERROR_FIELD_NOT_VALID;

        $new_role_id = $new_role->db_id;
        $changing_person = new ORM_Person();
        $changing_person->db_id = $id;
        $result = $changing_person->load();

        if (!$result) return M_Error::_ERROR_FIELD_NOT_VALID;

        $changing_person->db_role_id = $new_role_id;
        $result = $changing_person->save();
        if (!$result) return M_Error::_ERROR_FIELD_NOT_VALID;

        return true;
    }
}