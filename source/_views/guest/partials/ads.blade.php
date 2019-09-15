<?php
$isProduction = $page['production'];
?>
<div class="container">
    <?php if ($isProduction) { ?>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-8821108004642146",
                enable_page_level_ads: true
            });
        </script>
    <?php } ?>
    <?php if ($isProduction == false) { ?>
        ADS WILL BE VISIBLE HERE ON PRODUCTION WEBSITE
    <?php } ?>
</div>