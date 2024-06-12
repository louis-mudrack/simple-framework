<?php $template = 'main'; require_once($_SERVER["DOCUMENT_ROOT"]."/_settings/site.config.php") ?>
    <div class="row">
        <div class="col large-8 large-prefix-2 large-suffix-2">
            <form method="post" action="../_essentials/mailing.php">
                <div class="row">
                    <div class="col medium-6">
                        <label for="mail">Email:</label>
                        <input type="email" name="mail" id="mail" required>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" required>
                        <label for="business">Business:</label>
                        <input type="text" name="business" id="business">
                    </div>
                    <div class="col medium-6">
                        <label for="phone">Phone:</label>
                        <input type="tel" name="phone" id="phone">
                        <label for="message">Message:</label>
                        <textarea name="message" id="message" required></textarea>
                        <label for="callback">Callback:</label>
                        <input type="checkbox" name="callback" id="callback" value="Yes">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php require(SITE_ROOT."_essentials/site.exit.php"); ?>
