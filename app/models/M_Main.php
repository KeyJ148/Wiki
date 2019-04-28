<?php


class M_Main extends Model {

    public function getData(){
        $data['title'] = M_MAIN_TITLE;
        $data['content_description'] = 'На данной странице отображена общая информация о компании.';
        $data['content'] = $this->getContent();

        return $data;
    }

    private function getContent(){
        $content = new M_ContentConstructor();

        $name = 'Wiki';
        $text = 'На данном сайте имеется раздел "Wiki" в котором структурирована вся необходимая для компании информация.';
        $content->addTopic($name, $text);

        $name = 'Участники';
        $text = 'В разделе "Участники" вы можете посмотреть список всех пользователей системы. 
                 Если вы обладаете правами администратора, вы также можете изменять права другим участникам.';
        $content->addTopic($name, $text);

        $name = 'Профиль';
        $text = 'Для регистрации и авторизации вы можете воспользоваться разделом "Профиль".';
        $content->addTopic($name, $text);

        $name = 'GitHub';
        $text = 'Скачать движок Wiki можно по следующему адресу:
                 <a href="https://github.com/KeyJ148/Wiki/archive/master.zip">Zip-file</a><br>
                 Ссылка на страницу GitHub движка Wiki:
                 <a href="https://github.com/KeyJ148/Wiki">Github</a>';
        $content->addTopic($name, $text);

        return $content->getData();
    }
}