<div id="container" class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center" >Úprava záznamu </h2>
            <br><br>
            <?php
            if(isset($edit_data) && is_array($edit_data) && count($edit_data)): $i=1;
                foreach ($edit_data as $key => $data) {
                    ?>
                    <form method="post" action="<?php echo base_url('index.php/Odkial/update_data/'.$data['id'].''); ?>" name="data_register">
                        <label for="Obec" style="color: white">Enter Obec</label>
                        <input type="text" class="form-control" name="Obec" value="<?php echo $data['Obec']; ?>" required >
                        <br>
                        <label for="Ulica" style="color: white">Enter ulica</label>
                        <input type="text" class="form-control" name="Ulica" value="<?php echo $data['Ulica']; ?>" required>
                        <br>
                        <br><br>
                        <a href="<?php echo base_url('index.php/Odkial'); ?>"<button class="btn btn-danger pull">Späť</button></a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <br><br>
                    </form>
                    <?php
                }endif;
            ?>
            <br><br>
        </div>
    </div>

</div>