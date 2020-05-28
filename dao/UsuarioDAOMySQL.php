<?php
    require_once 'models/Usuario.php';

    class UsuarioDAOMySQL implements UsuarioDAO {
        private $pdo;

        public function __construct(PDO $driver){
            $this->pdo = $driver;
        }
        
        public function add(Usuario $u){
            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, divida, cidade) VALUES (:nome, :divida, :cidade)");
            $sql->bindValue(':nome', $u->getNome());
            $sql->bindValue(':divida', $u->getDivida());
            $sql->bindValue(':cidade', $u->getCidade());
            $sql->execute();

            $u->setId( $this->pdo->lastInsertId());
            
            return $u;
        }
        public function findAll(){
            $array = [];

            $sql = $this->pdo->query("SELECT * FROM usuarios");
            if($sql->rowCount() > 0){
                $data = $sql->fetchAll();

                foreach($data as $item){
                    $u = new Usuario();
                    $u->setId($item['id']);
                    $u->setNome($item['nome']);
                    $u->setDivida($item['divida']);
                    $u->setCidade($item['cidade']);

                    $array[] = $u;
                }
            }

            return $array;
        }
        public function findById($id){

        }
        public function update(Usuario $u){

        }
        public function delete($id){

        }
    }