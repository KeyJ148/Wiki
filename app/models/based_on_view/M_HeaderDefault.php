<?php

class M_HeaderDefault extends Model{

    public function getData(){
        $header['text'] = 'Wiki';

        $header['menu'][0]['url'] = '/';
        $header['menu'][0]['name'] = 'Главная';
        $header['menu'][0]['active'] = false;

        $header['menu'][1]['url'] = '/wiki/';
        $header['menu'][1]['name'] = 'Wiki';
        $header['menu'][1]['active'] = false;

        $header['menu'][2]['url'] = '/members/';
        $header['menu'][2]['name'] = 'Участники';
        $header['menu'][2]['active'] = false;

        $header['menu'][3]['url'] = '/profile/';
        $header['menu'][3]['name'] = 'Профиль';
        $header['menu'][3]['active'] = false;

        return $header;
    }
}
