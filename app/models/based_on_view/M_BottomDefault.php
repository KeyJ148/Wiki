<?php

class M_BottomDefault extends Model {

    public function getData(){
        $view_bootom['sidebar_heading'] = 'Контакты';
        $view_bootom['list_1_link'] = M_BOTTOM_LINK_1;
        $view_bootom['list_1_name'] = M_BOTTOM_NAME_1;
        $view_bootom['list_2_link'] = M_BOTTOM_LINK_2;
        $view_bootom['list_2_name'] = M_BOTTOM_NAME_2;
        $view_bootom['content_heading'] = 'Обратная связь';
        $view_bootom['content_text'] = 'Если у вас имеются какаие-либо вопросы или предложения по работе, структуре или
                                        оформлению сайта —  пишите нам на почту, либо в телеграмм.';

        return $view_bootom;
    }
}