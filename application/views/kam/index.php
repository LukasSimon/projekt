<div id="container" class="container" >

    <!--******************** START SESSION SETFLASH MESSAGES *****************************-->
    <?php if($this->session->flashdata('kam')){?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('kam')?>
        </div>
    <?php } ?></div>
<!--************************* END SESSION SETFLASH MESSAGES   ************************-->



<!--*************************  START  DISPLAY ALL THE RECODEDS *************************-->
<div id="page-wrapper" >
    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <h2>Tabuľka Kam</h2>
            </div>
        </div>

        <div align="left">
            <a href="<?php echo site_url('Kam/add_data'); ?>">Pridanie nového záznamu</a>
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
                                <th style="color: black">No.</th>
                                <th style="color: black">Obec</th>
                                <th style="color: black">Ulica</th>
                                <th style="color: black" >Možnosti</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
                                foreach ($view_data as $key => $data) {
                                    ?>
                                    <tr <?php if($i%2==0){echo 'class="even"';}else{echo'class="odd"';}?>>
                                        <td><?php echo $data->id; ?></td>
                                        <td><?php echo $data->Obec; ?></td>
                                        <td><?php echo $data->Ulica; ?></td>
                                        <td><a href="<?php echo site_url('Kam/edit_data/'. $data->id.''); ?>">Edit</a></td>
                                        <td><a href="<?php echo site_url('Kam/delete_data/'. $data->id.''); ?>">Delete</a></td>
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
<!--*********************  END  DISPLAY ALL THE RECODEDS ******************************-->

