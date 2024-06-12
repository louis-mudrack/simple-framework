<?php $template = 'main'; require_once($_SERVER["DOCUMENT_ROOT"]."/_settings/site.config.php") ?>
    <div class="row">
        <div class="large-8 large-prefix-2 large-suffix-2">
            <h2>The form was send successfully</h2>
            <a href="/" title="<?php echo $navigation["Kontakt"]["title"]; ?>" class="btn">Back to home</a>
        </div>
    </div>
<?php require(SITE_ROOT."_essentials/site.exit.php"); ?>
