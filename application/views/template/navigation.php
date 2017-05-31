<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="<?php echo base_url();?>assets/img/taxi-128.png" class="user-image img-responsive"/>
            </li>

            <li>
                <a class="active-menu"  href="<?php echo base_url(); ?>index.php/Home"><i class="fa fa-dashboard fa-3x"></i> Home</a>
            </li>
            <li>
                <a   href="<?php echo base_url(); ?>index.php/Grafy"><i class="fa fa-bar-chart-o fa-3x"></i> Grafy</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap fa-3x"></i> Tabuľky<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Auto/index">Autá</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Vodici/index">Vodiči</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Sluzba/index">Služba</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Odkial/index">Odkial</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Kam/index">Kam</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>index.php/Cesta/index">Cesta</a>
                    </li>
                </ul>
            </li>
        </ul>
        <br/>
    </div>
</nav>