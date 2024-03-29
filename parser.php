<?php
class Script{
  const PARSE_STRING = 0;
  const PARSE_FILE = 1;
  const PARSE_URL = 2;
  
  private $data;

  public function __construct(){
      $this->data = new ScriptData();
  }

  public function parse(string $data, int $mode = 0){
     $context = "";
     switch($mode){
       case self::PARSE_STRING:
         $context = $data;
       break;
       case self::PARSE_FILE:
         if(!file_exsists($data)){
           throw new Exception("Could not find the file: ".$data);
         }

         $context = file_get_contents($data);
       break;
       case self::PARSE_URL:
         $context = file_get_contents($data);
       break;
       default:
         throw new Exception("Unknown mode");
     }

     $this->begin($source);
  }

  private function begin($source){
     $token = new Tokenizer(new StringReader($source));
        
  }
}
