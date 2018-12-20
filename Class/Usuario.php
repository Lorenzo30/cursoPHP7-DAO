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

                 $this-> setData($row);


            }



      }


      public function __construct($login = "",$senha = ""){

           $this-> setDesLogin = $login;
           $this-> setDesSenha = $senha;


      }

      public function insert(){
          
          $sql  = new Sql();

          $results = $sql->select("CALL sp_usuarios_insert(:Login, :Senha)",array(
                 "Login"=> $this->getDesLogin(),
                 "Senha"=> $this->getDesSenha()



          ));


           if(count($results) > 0){
                  
                  $this-> setData($results[0]);


           }

          



      }

      public function setData($dados){

           $this-> setIdUsuario($dados["idusuario"]);
                $this-> setDesLogin($dados["deslogin"]);
                $this-> setDesSenha($dados['dessenha']);
                $this-> setDtCadastro(new DateTime($dados['dtcadastro']));



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

              $this-> setData($row);



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

      public function update($login,$senha){



        $this-> setDesLogin($login);
        $this-> setDesSenha($senha);

        $sql = new Sql();

        $sql -> query("UPDATE tb_usuarios set deslogin = :Login, dessenha = :senha WHERE idusuario = :id",array(
              
              ":Login"=> $this->getDesLogin(),
              ":senha"=> $this->getDesSenha(),
              ":id"=> $this->getIdUsuario()



        ));





      }



  }


?> 