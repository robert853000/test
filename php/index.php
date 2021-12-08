<?php
require_once('./libraries/email.php');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Page title</title>
  </head>
  <body>
  <header>
            <div id="logo"><h1>Logo</h1></div>
            <nav>
                <ul>
                    <li><a href="index.php?Page=home">Home</a></li>
                    <li><a href="index.php?Page=page2">Page 2</a></li>
                </ul>
            </nav>
        </header>

        <article>
            <div id="content1">
                <header>
<?php
$incPage=isset($_GET['Page'])?$_GET['Page']:(isset($_POST['Page'])?$_POST['Page']:"home");
$incPage=htmlspecialchars($incPage);
$insertionSuccessful =false;
$Help="";
if (!preg_match('/^[a-z0-9]+$/', $incPage)){
    $Help=('Invalid parameters');
    $incPage = 'home';
}
if (!file_exists('subpages/' . $incPage . '.php')){
    $Help=('Page not found');
}
switch($incPage){
    case "page2":
        echo "<h1>Page 2</h1>";
        break;
    case "home":
        echo "<h1>Home</h1>";
        break;
 
        break;

    default:

        $incPage = 'home';
        break;
}
?>
                    
                </header>

                <section>
<?php
echo $Help;
if (file_exists('subpages/' . $incPage . '.php')){
   
    $inc = include('subpages/' . $incPage . '.php');
    if (!$inc)
       echo('Error include');
}




?>
                </section>
            </div>
        </article>


        <footer>
           footer
        </footer>
  </body>
</html>