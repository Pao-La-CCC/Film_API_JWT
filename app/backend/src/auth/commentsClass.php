<?php


require_once('/Applications/MAMP/htdocs/app/backend/src/auth/BaseModel.php')  ;

use Tools\BaseModel\BaseModel;

class Comment extends BaseModel {

    public $id_comments ;
    public $date ;
    public $title ;
    public $authorId ;
    private $content;
    public $table_name = 'comments';
    public $all_info = [] ;

    function __construct() {
	
        echo "Je suis le Model de Comments"; ;
    }

    public function index ()
    {
        echo "Je suis la fonction index du model Comment";
    }

    function get_All_comments() {
        $this->all_info = $this->getAll($this->table) ;
        return $this->all_info ;
    }

     /**   Partie GETTER  */


    public function getCommentId() {
        $this->id_comments = $this->getOneById('comments_id',$this->table_name, 38) ;
        return $this->id_comments;
    }


    public function getAuthorId() {
        $this->authorId = $this->getOneById('user_id',$this->table_name, 38) ;
        return $this->authorId;
    }


    public function getDate() {
        $this->email = $this->getOneById('mail',$this->table_name, 38) ;
        return $this->date;
    }

   
 
    public function getTitle() {
        $this->title = $this->getOneById('title',$this->table_name, 38) ;
        return $this->title;
    }


    public function getContent() {
        $this->content = $this->getOneById('content',$this->table_name, 38) ;
        return $this->content;
    }


    
  




}