<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/Css/style.css" type="text/css" />
    <title>Example</title>
</head>
<body>
  
    <header>
          <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <div class="container">
              <?php
                echo App\Core\Menu::getInstance()->getMenu();
              ?>
            </div>
          </nav>
    </header>
    <main>
      <div class="container">