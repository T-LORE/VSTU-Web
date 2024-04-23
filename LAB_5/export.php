
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/header.php')?>
<div class="container-xxl px-4">   
<form action="exportJSON.php" method="GET">
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <!-- set download field to true with this button -->
            <button type="submit" name="download" value="true" class="btn btn-primary">Скачать в JSON</button>
        </div>
    </div> 
</form>
</div>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LAB_3/components/footer.php')?>
