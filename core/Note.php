<?php

/**
* Note class
*/
class Note
{
    function __construct(Array $input){
        $this->content = isset($input['content']) ? $input['content'] : false;
        $this->slug = isset($input['slug']) ? $input['slug'] : false;
        $this->updated = isset($input['updated']) ? $input['updated'] : false;
        $this->creation = time();
    }

    public function html(){
        // $content = new Parsedown();
        $content = new Parsedown();
        return $content->text($this->content);
    }

    public function title(){
        return getTextBetweenTags($this->html(), 'h1');
    }

    public function excerpt($lenght = 200){
        $title_lenght = strlen($this->title());
        $raw_content = strip_tags($this->html());
        $excerpt = str_replace("\n", ' ', substr($raw_content, $title_lenght, $lenght));
        return $excerpt.'&hellip;';
    }

    public function slug(){
        return slugify($this->slug);
    }

    public function permalink(){
        return config('url').'/'.$this->slug();
    }

    public function updated(){
        return date(config('dateformat'), $this->updated);
    }
}
