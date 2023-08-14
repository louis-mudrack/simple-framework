<?php require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php") ?>
<?php require_once(SITE_ROOT."include/head.php"); ?>
    <?php require_once(SITE_ROOT."include/header-secondary.php"); ?>
    <?php require_once(SITE_ROOT."misc/mailing.php");?>
        <main>
            <div class="row">
                <div class="col large-8 large-prefix-2 large-suffix-2">
                    <form method="post">
                        <label for="mail">Email:</label>
                        <input type="email" name="mail" id="mail" value="<?php echo isset($_POST["mail"])? htmlspecialchars($_POST["mail"]) : "";?>">
                        <?php if (isset($error_mail)) {?>
                            <p><?php echo $error_mail;?></p>
                        <?php }?>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?php echo isset($_POST["name"])? htmlspecialchars($_POST["name"]) : "";?>">
                        <?php if (isset($error_name)) {?>
                            <p><?php echo $error_name;?></p>
                        <?php }?>
                        <label for="business">Business:</label>
                        <input type="text" name="business" id="business" value="<?php echo isset($_POST["business"])? htmlspecialchars($_POST["business"]) : "";?>">
                        <?php if (isset($error_business)) {?>
                            <p><?php echo $error_business;?></p>
                        <?php }?>
                        <label for="phone">Phone:</label>
                        <input type="tel" name="phone" id="phone" value="<?php echo isset($_POST["phone"])? htmlspecialchars($_POST["phone"]) : "";?>">
                        <?php if (isset($error_phone)) {?>
                            <p><?php echo $error_phone;?></p>
                        <?php }?>
                        <label for="message">Message:</label>
                        <textarea name="message" id="message"><?php echo isset($_POST["message"])? htmlspecialchars($_POST["message"]) : "";?></textarea>
                        <?php if (isset($error_message)) {?>
                            <p><?php echo $error_message;?></p>
                        <?php }?>
                        <label for="callback">Callback:</label>
                        <input type="checkbox" name="callback" id="callback" value="true" <?php echo isset($_POST["callback"]) && $_POST["callback"] == "true"? "checked" : "";?>>
                        <?php if (isset($error_callback)) {?>
                            <p><?php echo $error_callback;?></p>
                        <?php }?>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </main>
        <?php include(SITE_ROOT."include/footer.php"); ?>