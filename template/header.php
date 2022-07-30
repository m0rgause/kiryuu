<!DOCTYPE html>
<html lang="id-ID" itemscope="itemscope" itemtype="https://schema.org/WebPage">

<head profile="https://gmpg.org/xfn/11">
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="viewport" content="width=device-width">
    <meta name="robots" content="all">
    <title>KNTOL | Manga Manhua Manhwa</title>
    <meta name="description" content="KNTOL adalah website baca komik gratis berbahasa Indonesia">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var e;
            if ("IntersectionObserver" in window) {
                e = document.querySelectorAll(".lazy");
                var n = new IntersectionObserver(function(e, t) {
                    e.forEach(function(e) {
                        if (e.isIntersecting) {
                            var t = e.target;
                            t.src = t.dataset.src, t.classList.remove("lazy"), t.classList.add("no-lazy"), n.unobserve(t)
                        }
                    })
                });
                e.forEach(function(e) {
                    n.observe(e)
                })
            }
        });
    </script>
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/style-v1.css">
    <script src="<?= base_url() ?>/asset/js/jquery.js"></script>
    <link rel="icon" href="komiku.id/asset/img/ico.ico">
    <meta name="mobile-web-app-capable" content="yes">
</head>