<?php require_once($_SERVER["DOCUMENT_ROOT"]."/misc/site.config.php") ?>
<?php require_once(SITE_ROOT."include/head.php"); ?>
    <?php require_once(SITE_ROOT."include/header-secondary.php"); ?>
        <main>
            <div class="row">
                <div class="col large-8 large-prefix-2 large-suffix-2">
                    <form action="../misc/mailing.php" method="post">
                        <div class="row">
                            <div class="col large-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" required>
                                <label for="mail">E-Mail</label>
                                <input type="email" name="mail" id="mail" required>
                                <label for="business">Business</label>
                                <input type="text" name="business" id="business">
                            </div>
                            <div class="col large-6">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" id="phone">
                                <label for="callback">
                                    <input type="checkbox" name="callback" id="callback">
                                    Call back
                                </label>
                                <label for="message">Message</label>
                                <textarea name="message" id="message" required></textarea>
                            </div>
                            <div class="col large-12">
                                <label for="privacy-policy">
                                    <input type="checkbox" name="privacy-policy" id="privacy-policy" required>
                                    I have read and accept the <a href="/privacy-policy" title="Our privacy policy">privacy policy</a>.
                                </label>
                                <input type="submit" value="Submit" name="submit" class="btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include(SITE_ROOT."include/footer.php"); ?>