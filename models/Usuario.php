<?php
    class Usuario {
        private $id;
        private $nome;
        private $divida;
        private $cidade;

        public function  getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = trim($id);
        }

        public function  getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = ucwords(trim($nome));
        }

        public function  getDivida(){
            return $this->divida;
        }
        public function setDivida($divida){
            $this->divida = trim($divida);
        }

        public function  getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            $this->cidade = ucwords(trim($cidade));
        }
    }

    interface UsuarioDAO{
        public function add(Usuario $u);
        public function findAll();
        public function findById($id);
        public function update(Usuario $u);
        public function delete($id);
    }