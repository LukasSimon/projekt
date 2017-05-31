<div id="container" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center">Pridanie záznamu</h2>
            <br><br>
            <form method="post" action="<?php echo site_url('Auto/submit_data'); ?>" name="data_register">
                <label for="Znacka" style="color: white">Znacka</label>
                <input type="text" class="form-control" name="Znacka" required >
                <br>
                <label for="Evidencne_cislo" style="color: white">Evidencne cislo</label>
                <input type="text" class="form-control" name="Evidencne_cislo" required>
                <br>
                <a href="<?php echo base_url('index.php/Auto'); ?>"<button class="btn btn-danger pull">Späť</button></a>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <br><br>
            </form>
        </div>
    </div>
</div>