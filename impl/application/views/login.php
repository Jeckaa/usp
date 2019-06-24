<html>
    <head>
        <link rel="stylesheet" type="text/css" href="bootstrap.css"> 
    </head>
    <body>
        <div class="centered">
            <div class="container-fluid justify-content-center">
                <div class="row" >
                    <div class="col-sm-12">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-12">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-12">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-12">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
                <div class="row" >
                    <div class="col-sm-12">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12"> 
                        <?php if (isset($message)) echo "<p style=\"color:red; text-align:center;\">$message</p>"; ?>
                    </div>
                </div>
                <form name="loginForma" action=<?php echo site_url("Gost/login")?> method="post">
                    <div class="row text-center">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-6 text-center">
                             <div class="form-group">
                                <label for="username">Korisnicko ime:</label>
                                <input type="text" class="form-control" name="username" id="username" maxlength="38" placeholder="Unesite Vase korisnicko ime" size="38">
                            </div>
                        </div>
                        <div class="col-sm-3"> </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="pass">Lozinka:</label>
                                <input type="password" class="form-control" name="password" id="pass" placeholder="Unesite Vasu sifru" maxlength="38">
                            </div>    
                        </div>
                        <div class="col-sm-3"> </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-3"> </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Potvrdi</button>
                            </div>
                        </div>
                        <div class="col-sm-3"> </div>
                    </div>   
                </form>
            </div>
        </div> 
    </body>
</html>
