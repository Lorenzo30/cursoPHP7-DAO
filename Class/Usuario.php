<?php


  class Usuario{

      private $idUsuario;
      private $desLogin;
      private $desSenha;
      private $dtCadastro;



      public function getIdUsuario(){
          
          return $this -> idUsuario;

      }

       

      public function setIdUsuario($id){
          
          return $this -> idUsuario = $id;

      }


       public function getDesLogin(){
          
          return $this -> desLogin;

      }

       

      public function setDesLogin($login){
          
          return $this -> desLogin = $login ;

      }


       public function getDesSenha(){
          
          return $this -> desSenha;

      }


       public function setDesSenha($senha){
          
          return $this -> desSenha = $senha ;

      }

       

    

       public function getDtCadastro(){
          
          return $this -> dtCadastro;

      }

       

      public function setDtCadastro($dtCadastro){
          
          return $this -> dtCadastro = $dtCadastro;

      }

      public function loadById($id){

            $sql = new Sql();

           $results  = $sql -> select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",array(
               "ID"=>$id


            ));

            if(count($results[0]) > 0){

                $row  = $results[0];

                $this-> setIdUsuario($row['idusuario']);
                $this-> setDesLogin($row['deslogin']);
                $this-> setDesSenha($row['dessenha']);
                $this-> setDtCadastro(new DateTime($row['dtcadastro']));



            }



      }

      public static function getList(){
           
           $sql  = new Sql();

          return  $sql -> select("SELECT * FROM tb_usuarios ORDER BY deslogin");


      }

      public static function search($login){

         $sql = new Sql();

         return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :search ORDER BY deslogin",array(
              ":search"=> "%".$login."%"



         ));


      }


      public function login($login,$senha){

              $sql = new Sql();

           $results  = $sql -> select("SELECT * FROM tb_usuarios WHERE deslogin = :Login AND desSenha = :Senha",array(
               "Login"=>$login,
               "Senha"=>$senha


            ));

            if(count($results[0]) > 0){

                $row  = $results[0];

                $this-> setIdUsuario($row['idusuario']);
                $this-> setDesLogin($row['deslogin']);
                $this-> setDesSenha($row['dessenha']);
                $this-> setDtCadastro(new DateTime($row['dtcadastro']));



            }else{


                  throw new Exception("Login ou senha invalidos");


            }





      }
  

      public function __toString(){

            return json_encode(array(

             "idUsuario" => $this->getIdUsuario(),
             "Senha" => $this->getDesSenha(),
             "Login" => $this->getDesLogin(),
             "Data_Cadastro" => $this->getDtCadastro()->format("d/m/Y H:i:s" )


            ));



            


      }



  }


?> 