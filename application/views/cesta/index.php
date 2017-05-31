<div id="container" class="container" >

    <?php if($this->session->flashdata('cesta')){?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('cesta')?>
        </div>
    <?php } ?></div>

<div id="page-wrapper" >
    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <h2>Tabuľka cesty</h2>
            </div>
        </div>

        <div align="left">
            <a href="<?php echo base_url('index.php/Cesta/add_data'); ?>">Pridanie nového záznamu</a>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tabuľka
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>

                                <th style="color: black">Dátum</th>
                                <th style="color: black">Cena</th>
                                <th style="color: black">Vodič</th>
                                <th style="color: black">Odkial</th>
                                <th style="color: black">Kam</th>
                                <th style="color: black">Možnosti</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
                                foreach ($view_data as $key => $data) {
                                    ?>
                                    <tr <?php if($i%2==0){echo 'class="even"';}else{echo'class="odd"';}?>>

                                        <td><?php echo $data->Datum; ?></td>
                                        <td><?php echo $data->Cena; ?></td>
                                        <td><?php echo $data->vMeno; ?> <?php echo $data->vPriezvisko; ?></td>
                                        <td><?php echo $data->oObec; ?> <?php echo $data->oUlica; ?></td>
                                        <td><?php echo $data->kObec; ?> <?php echo $data->kUlica; ?></td>

                                        <td><a href="<?php echo base_url('index.php/Cesta/edit_data/'. $data->id.''); ?>">Edit</a></td>
                                        <td><a href="<?php echo base_url('index.php/Cesta/delete_data/'. $data->id.''); ?>">Delete</a></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            else:
                                ?>
                                <tr>
                                    <td colspan="7" align="center" >No Records Found..</td>
                                </tr>
                                <?php
                            endif;
                            ?>

                            </tbody>
                        </table>

                            <?=$this->pagination->create_links() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


