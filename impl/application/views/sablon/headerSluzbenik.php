<html>
    <head>
        <title>Sluzbenik</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo site_url("Sluzbenik/index"); ?>">INHOSQUOLI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url("Sluzbenik/index"); ?>">Pocetna <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" style="padding: 0px" class="btn btn-primary"><a class="nav-link" href="<?php echo site_url("Sluzbenik/pacijenti"); ?>">Pacijenti</a></button>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                    <a class="dropdown-item" href="<?php echo site_url("Sluzbenik/dodajPacijenta"); ?>">Dodaj pacijenta</a>
                                    <a class="dropdown-item" href="<?php echo site_url("Sluzbenik/izbrisiPacijenta"); ?>">Izbrisi pacijenta</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" style="padding: 0px" class="btn btn-primary"><a class="nav-link" href="<?php echo site_url("Sluzbenik/lekari"); ?>">Lekari</a></button>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                    <a class="dropdown-item" href="<?php echo site_url("Sluzbenik/dodajLekara"); ?>">Dodaj lekara</a>
                                    <a class="dropdown-item" href="<?php echo site_url("Sluzbenik/izbrisiLekara"); ?>">Izbrisi lekara</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url("Sluzbenik/logout"); ?>">Odjavljivanje</a>
                    </li>
                </ul>
            </div>
        </nav>
