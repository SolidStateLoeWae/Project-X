<?php
class database{
    protected $server = "localhost";
    protected $dbuser = "root";
    protected $dbpw = "";
    protected $db = "finall";
    protected $con;
    
    function __construct() {
        $this->con = new mysqli($this->server,$this->dbuser,$this->dbpw, $this->db);
        $this->con->set_charset("utf8");
   }
   


  public function login($lietotajvards,$parole) {

        
            $lietotajvards = mysqli_real_escape_string($this->con,$_POST["lietotajvards"]);
            $parole = md5(mysqli_real_escape_string($this->con,$_POST["parole"]));
            if($lietotajvards == ("az") & $parole == ("az1") ){ 
                header("location:admin.php");
                session_start();
                $_SESSION['lietotajvards'] = $lietotajvards;
            }


            $i = 0;
            $result = mysqli_query($this->con,"SELECT lietotajvards, parole FROM lietotaji WHERE lietotajvards = '$lietotajvards' AND parole = '$parole'") or die("Error: " . mysqli_error($this->con)); 

            

            while(mysqli_fetch_array($result)){
                $i++;
            }

           
            if($i == 0) {echo "Nepareizs lietotājvārds vai parole";}
            if($i == 1) { 
                header("location:sakums.php");
                session_start();
                $_SESSION['lietotajvards'] = $lietotajvards;
            }

            if ($lietotajvards==("az")) {
                header("location:admin.php");
                session_start();
                $_SESSION['lietotajvards'] = $lietotajvards;

            }

           
        

    }
    


  public function reg($vards,$uzvards,$letotajvards,$parole1,$parole2,$epasts)
  {
    
    //pārbaude, vai paroles sakrīt
            if($_POST['parole1'] == $_POST['parole2']){
                $vards =  mysqli_real_escape_string($this->con,$_POST["vards"]); 
                $uzvards =  mysqli_real_escape_string($this->con,$_POST["uzvards"]); 
                $lietotajvards = mysqli_real_escape_string($this->con,$_POST["lietotajvards"]); 
                $epasts = mysqli_real_escape_string($this->con,$_POST["epasts"]); 
                $parole = md5(mysqli_real_escape_string($this->con,$_POST["parole1"])); 
                //infromācijas saglabāšana datu bāzē
                mysqli_query($this->con,"INSERT INTO lietotaji (vards, uzvards, lietotajvards, parole, epasts)
                VALUES ('$vards', '$uzvards', '$lietotajvards', '$parole', '$epasts')");
                }
            // paroļu if beigas
        else {echo "Paroles nesakrīt, lūdzu ievadiet nepieciešamo informāciju vēlreiz!";}
       //if beigas
    
}




  
    public function insertCategory($categoryNew){
       
      
     
        $sql = "INSERT INTO prieksmeti (prieksmets) VALUES
        ('{$categoryNew}')";
        $result=$this->con->query($sql);              
        

        //informācijas atpoguļošana
        $result = mysqli_query($this->con,"SELECT * FROM prieksmeti") or die("Error: " . mysqli_error($this->con));
            //nodrošina nummerāciju
            $i = 0;
            echo "<table>";
            while($row = mysqli_fetch_array($result)) {
            $i++;
                echo "<tr>";
                echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>{$i}.</b></td>";
                echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'><b>{$row['prieksmets']}</b></td>";
            
                echo "</tr>";
            }
            echo "</table>";
    
}


    public function deleteCategory($categoryID){

         

          $sql = "DELETE FROM prieksmeti WHERE id ='{$categoryID}'";
          $result=$this->con->query($sql);

       

         $result = mysqli_query($this->con,"SELECT * FROM prieksmeti") or die("Error: " . mysqli_error($this->con));
            //nodrošina nummerāciju
            $i = 0;
            echo "<table>";
            while($row = mysqli_fetch_array($result)) {
            $i++;
                echo "<tr>";
                echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>{$i}.</b></td>";
                echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'><b>{$row['prieksmets']}</b></td>";
            
                echo "</tr>";
            }
            echo "</table>";
    }


    public function editCategory($categoryID, $categoryValue){

       
        $result = mysqli_query($con,"SELECT * FROM prieksmeti") or die("Error: " . mysqli_error($con));
        $con = mysqli_connect("localhost","root","","finall");
            //nodrošina nummerāciju
            $i = 0;
            echo "<table>";
            while($row = mysqli_fetch_array($result)) {
            $i++;
                echo "<tr>";
                echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'right' ><b>{$i}.</b></td>";
                echo "<td width='100px' align = 'center'><div class = 'tabulas_teksts' align = 'left'><b>{$row['prieksmets']}</b></td>";
                echo "<td width='100px'><a href='edit.php?ID={$row['ID']}'>Labot</a></td>";
                echo "</tr>";
            }
            echo "</table><hr/>";
        
            
        //atrodam ierakstu kuru gribēsim labot. tā kā sākumā nav padots id, pēc kura varētu labot ierakstu ir jāpārbaudatā vērtība true vai false
    if(isset($_GET['ID']) == true){
        $test = $_GET['ID'];    
        $result = mysqli_query($con,"SELECT * FROM prieksmeti WHERE ID = $test") or die("Error: " . mysqli_error($con));
        while($row = mysqli_fetch_array($result)) {
                $lab_prieksmets =  $row['prieksmets'];
        }       
        
        echo "<div style = 'color:#000000'><b>Ieraksts kurš tiks labots:</b> {$lab_prieksmets}</div>";
        //echo $test;
    

        $sql = "UPDATE category set category_name = '{$categoryValue}' WHERE  id='{$categoryID}'";
        $rs=$this->con->query($sql);
    

}

}

}



?>






