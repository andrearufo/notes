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

    public function content(){
        return $this->content;
    }

    public function excerpt(){
        return substr($this->content, 0, 60);
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
