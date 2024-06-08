<?php
    class Menu{

        private $pages;


        public function __construct($pages){
            $this->pages = $pages;
        }


        function generate_menu(): string{
            $menu_items = ''; 
            
            foreach($this->pages as $page_name => $page_url){

                $menu_items .= '<li class="nav-item"><a class="nav-link" href="' . $page_url . '">' . $page_name . '</a></li>';

            }
        
            return $menu_items;
        }


    }


?>