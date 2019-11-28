<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *{
            box-sizing:border-box !important;
        }

        a:hover{
            text-decoration: none !important;
        }

        .row{
            width: 100%;
        }

        .alert{
            padding-right: 10px !important;
        }

        a.btn{
            width: max-content;
        }

        #hidden{
            display: none;
        }
        a#form:
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <ul class="nav nav-pills mb-3 bg-dark" id="pills-tab" role="tablist">
            <h3 class="text-danger px-4">todo schedule</h3>
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-sm-6">
                
            
            </div>
            <div class="col-sm-6">
                <form action="<?php if(isset($_SESSION['todo'])){echo "todoEdit.php";}else{echo "todoSet.php";}?>" role="form" name="setTodo" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="title">title</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="title" id="title" value="<?php if(isset($_SESSION['todo'])){echo $_SESSION['todo']['title'];} ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="body">body</label>
                            </div>
                            <div class="col-sm-8">
                                <textarea name="body" id="body" cols="30" rows="4" style="resize: none"  class="form-control"><?php if(isset($_SESSION['todo'])){echo $_SESSION['todo']['body'];} ?></textarea>
                            </div>
                        </div>   
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="importance">impotrance</label>
                            </div>
                            <div class="col-sm-8">
                                <select name="importance" id="importance" class="form-control">
                                    <option value="primary">primary</option>
                                    <option value="secondary">secondary</option>
                                    <option value="tertiary">tertiary</option>
                                </select>
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-sm-8 offset-3">
                            <input type="submit" value="<?php if(isset($_SESSION['todo'])){echo "update";}else{echo "submit";} ?>" log todo" class="btn btn-primary mt-4">                 
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="todo.js"></script>
</body>
</html>