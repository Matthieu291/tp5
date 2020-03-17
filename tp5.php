<?php
session_start();
setcookie("cookie0", "test0");
setcookie("cookie1", "test1", time() + 1209600);

function convert ($temperature) {
    $t = ($temperature - 32) * 5 / 9;
    echo "temperature : ".round($t,2);
    echo "<br>";
}

function ex2 ($form){

}


echo "<h1> TP5 </h1>";
echo "<h2> Exercice 1 </h2>";
$temperature = 35;
echo "<a href=\"?temp=$temperature\">Cliquez pour avoir la valeur en degré</a><br>";
if (!empty($_GET['temp'])) {
    convert ($_GET['temp']);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>On est Jeudi</title>
</head>
<body>
    <form action ="" method ="post">
    Valeur en Fahrenheit : <input type ="text" name ="temp1"/>
    <br>
    <input type="submit" value ="Convertir" />
    </form>

</body>

 <?php

if (!empty($_POST['temp1'] != 0)){
    convert ($_POST['temp1']);
}

echo "<h2> Exercice 2 </h2>";
?>
<body>
<form action ="" method="post">
    Nom : <input type ="text" name ="nom" value ="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>"/>
    Prenom : <input type="text" name ="prenom" value ="<?php if (isset($_POST['prenom'])){echo $_POST['prenom'];} ?>"/>
    <br>
    Débutant :<input type="radio" name ="lvl" value ="debutant" <?php if($_POST["lvl"]=="debutant"){echo "checked";} ?> />
    Avancé :<input type ="radio" name ="lvl" value ="avance" <?php if($_POST["lvl"]=="avance"){echo "checked";} ?>/>
    <br>
    <input type ="reset" value ="Effacer"/>
    <input type ="submit" value="Envoyer"/>
    <br>
</form>
</body>
<?php
if(!empty($_POST['nom'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $niv = $_POST['lvl'];
    echo "Bonjour $prenom $nom. Vous avez un niveau $niv";
}

echo "<h2> Exercice 3 </h2>";
?>

<body>
<form action ="" method="post">
    Nom : <input type ="text" name ="nom1" value ="<?php if (isset($_POST['nom1'])){echo $_POST['nom1'];} ?>"/>
    Prenom : <input type="text" name ="prenom1" value ="<?php if (isset($_POST['prenom1'])){echo $_POST['prenom1'];} ?>"/>

    <br>Langues pratiquées (choisir au minimum 2) <br>
    <select name ="langues[]" type ="select" multiple size ="4" >
        <option value = "francais">francais </option>
        <option value = "anglais">anglais </option>
        <option value = "allemand"> allemand </option>
        <option value = "espagnol"> espagnol</option>
    </select><br>
    Compétences Informatiques (choisir au minimum 2) <br>
    HTML <input type="checkbox" name = "competence[]" value ="HTML"/>
    CSS <input type="checkbox" name = "competence[]" value ="CSS"/>
    PHP <input type="checkbox" name = "competence[]" value ="PHP"/>
    SQL <input type="checkbox" name = "competence[]" value ="SQL"/>
    C <input type="checkbox" name = "competence[]" value ="C"/>
    C++ <input type="checkbox" name = "competence[]" value ="C++"/>
    JS <input type="checkbox" name = "competence[]" value ="JS"/>
    PYTHON <input type="checkbox" name = "competence[]" value ="PYTHON"/>
    <br>
    <input type ="reset" value="EFFACER"/>
    <input type ="submit" value ="ENVOI" name ="oui"/>
    <br>
</form>
</body>
<?php

if (!empty($_POST['oui'])) {
    echo "<b>Récapitulatif de votre fiche d'information personnelle</b><br>";
    $nom1 = $_POST['nom1'];
    $prenom1 = $_POST['prenom1'];
    echo "Vous êtes $prenom1 $nom1<br>";
    $langues = $_POST['langues'];
    echo "Vous parlez :";
    foreach ($langues as $valeur) {
        echo "<li> $valeur </li>";
    }
    echo "Vous avez des compétences informatiques en :";
    $competences = $_POST['competence'];
    foreach ($competences as $valeur) {
        echo "<li> $valeur </li>";
    }
}
?>

<body>
<h2>Exercice 4</h2>
<form  method="post">
    Nombre 1    <input type="text" name ="nb1" value ="<?php if (isset($_POST['nb1'])){echo $_POST['nb1'];} ?>"/><br>
    Nombre 2    <input type="text" name="nb2" value ="<?php if (isset($_POST['nb2'])){ echo $_POST['nb2'];} ?>"/><br>
    Résultat    <input type="text" name="res" value ="
    <?php
            if (isset($_POST['add'])){
                $y = $_POST['nb1'] + $_POST['nb2'];
                echo $y;
            }
             else if (isset($_POST['minus'])){
                 $y = $_POST['nb1'] - $_POST['nb2'];
                 echo $y;
             }
             else if (isset($_POST['divide'])){
                 $y = $_POST['nb1'] / $_POST['nb2'];
                 echo $y;
             }
             else if (isset($_POST['add'])){
                 $y = pow($_POST['nb1'], $_POST['nb2']);
                 echo $y;
             }
    ?>
"/><br>
    Cliquer sur un bouton!
    <input type="submit" name ="add" value ="Addition x+y"/>
    <input type="submit" name ="minus" value ="Soustraction x-y"/>
    <input type="submit" name ="divide" value ="Division x/y"/>
    <input type="submit" name ="power" value ="Puissance x^y"/>
</form>
<h2>Exercice 5</h2>
<form method="post">
    Fichier 1 <input type="file" name ="f1" value ="Choisir un fichier
    <?php if (empty($_POST['f1'])){ echo " Aucun fichier choisi?>";}?>"/><br>
    Fichier 2 <input type="file" name ="f2" value ="Choisir un fichier
    <?php if (empty($_POST['f2'])){ echo " Aucun fichier choisi?>";}?>"/><br>
    <input type="submit" name="sendnude" value ="Envoi"/>
</form>
<?php
if (isset($_POST['sendnude'])) {
    if (isset($_POST['f1'])) {
        move_uploaded_file($_FILES['f1']['tmp_name'],"test.png");
    }
    if (isset($_POST['f2'])) {
        move_uploaded_file($_FILES['f2']['tmp_name'], "test1.png");
    }
}
?>
<br>
<table>
    <tbody>
    <tr>
        <td></td>
        <td>Fichier 1</td>
        <td>Fichier 2</td>
    </tr>
    <tr>
        <td>name</td>
        <td><?php echo $_FILES['f1']['name']?></td>
        <td><?php echo $_FILES['f2']['name']?></td>
    </tr>
    <tr>
        <td>type</td>
        <td><?php echo $_FILES['f1']['type']?></td>
        <td><?php echo $_FILES['f2']['type']?></td>
    </tr>
    <tr>
        <td>tmp_name</td>
        <td><?php echo $_FILES['f1']['tmp_name']?></td>
        <td><?php echo $_FILES['f2']['tmp_name']?></td>
    </tr>
    <tr>
        <td>error</td>
        <td><?php echo $_FILES['f1']['error']?></td>
        <td><?php echo $_FILES['f2']['error']?></td>
    </tr>
    <tr>
        <td>size</td>
        <td><?php echo $_FILES['f1']['size']?></td>
        <td><?php echo $_FILES['f2']['size']?></td>
    </tr>
    <tr>
        <td>Image</td>
<!--        <td>src =</td>-->

    </tr>
    </tbody>
</table>
<h2> Exercice 7</h2>
<?php
echo htmlspecialchars($_COOKIE['cookie0'])."<br>";
echo htmlspecialchars($_COOKIE['cookie1'])."<br>";
unset($_COOKIE['cookie0']);
unset($_COOKIE['cookie1']);
echo $_COOKIE['cookie0']."<br>";
echo $_COOKIE['cookie1']."<br>";
?>
<h2>Exercice 8</h2>
<?php
$tab = array([setcookie("oui","oui")], [setcookie("non","non")],[setcookie("peutetre","peutetre")]);
echo $_COOKIE['oui']."<br>";
echo $_COOKIE['non']."<br>";
echo $_COOKIE['peutetre']."<br>";
?>
 <h2>Exercice 9</h2>
<?php
echo session_id();
$_SESSION['nom3'] = "seb";
$_SESSION['t3'] = time();
$_SESSION['site3'] = "https://docs.google.com/document/d/1N9ohwZBiq478n8yTqmo-jS-t8zevaOf6oDUelt5p1hI/edit";
echo "<br>Bonjour ".$_SESSION['nom3']."<br>".$_SESSION['t3']."<br>".$_SESSION['site3']."<br>"
?>

<h2>Exercice 10</h2>
<?php
$fic = fopen("contact.txt","a+");
$i =NULL;
$tableau= [];
while ($i != fgets($fic)) {
    echo fgets($fic);
}
?>
</body>
</html>




