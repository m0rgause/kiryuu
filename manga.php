<?php
include_once "config.php";
include_once "template/header.php";
include_once "lib/Kiryu.class.php";

$komik = isset($_GET['komik']) ? $_GET['komik'] : die();
$data = $p->mangaDetail($komik);
$res = $data['result'];

?>

<body class="series" id="body">
    <?php include_once "template/nav.php" ?>

    <main class="perapih" class="margin-top:20px !important">
        <article>
            <header id="Judul">
                <h1 itemprop="name"><?= $res['title'] ?></h1>
                <p itemprop="description" class="desc"><?= $res['description'] ?></p>
                <div class="new1 sd rd">
                    <a href="<?= base_url() . "/ch" . $res['first_chapter']['link'] ?>" target="_blank"><span>Awal: </span><span>Chapter <?= $res['first_chapter']['chapter'] ?></span></a>
                </div>
                <div class="new1 sd rd">
                    <a href="<?= base_url() . "/ch" . $res['last_chapter']['link'] ?>" target="_blank"><span>Terbaru: </span><span>Chapter <?= $res['last_chapter']['chapter'] ?></span></a>
                </div>
            </header>

            <section id="Informasi">
                <div class="ims">
                    <img src="https://proxy.duckduckgo.com/iu/?u=<?= $res['image'] ?>?w=225&quality=60">
                </div>
                <table class="inftable">
                    <tr>
                        <td>Judul</td>
                        <td width="65%"><?= $res['title'] ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Komik</td>
                        <td><b><?= $res['info']['type'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td itemprop="creator"><?= $res['info']['author'] ?></td>
                    </tr>
                    <tr>
                        <td>Artist</td>
                        <td itemprop="creator"><?= $res['info']['artist'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $res['info']['status'] ?></td>
                    </tr>
                    <tr>
                        <td>Release</td>
                        <td><?= empty($res['info']['released']) ? '' : $res['info']['released'] ?></td>
                    </tr>
                    <tr>
                        <td>Updated On</td>
                        <td><?= $res['info']['updated_at'] ?></td>
                    </tr>


                </table>

                <ul class="genre">
                    <?php foreach ($res['genres'] as $g) : ?>
                        <li class="genre" itemprop="genre"><a href="<?= base_url() . $g['link']  ?>"><?= $g['name'] ?></a></li>
                    <?php endforeach ?>

                </ul>
            </section>
            <div class="mnu">
                <button class="tab def curr" onclick="openLink(event, 'Chapter')">Chapter</button>
            </div>

            <section class="sec" id="Chapter">
                <div class="tombol" onclick="bookmark('subscribe')" id="bookmark">
                    Bookmark
                </div>
                <div class="tombol nono" onclick="unbookmark('subscribe')" id="unbookmark" style="display:none">
                    X Batal Bookmark
                </div>
                <div class="tombol" onclick="bookmark('bacananti')" id="nanti">
                    Baca Nanti
                </div>
                <div class="tombol nono" onclick="unbookmark('bacananti')" id="unnanti" style="display:none">
                    X Baca Nanti
                </div>
                <div id="favorit">
                    <div class="tombol" id="baru" style="padding:0;background:#4164b3">
                        <div id="baru2" onclick="baru()" style="padding: 5px 10px;color:#fff">+ Koleksi Baru</div>
                        <div id="baru3" style="display:none">
                            <input name="bar" placeholder="ex: Isekai favorit" id="bar">
                            <div id="tambahkan" onclick="add()">+add</div>
                        </div>
                    </div>
                </div>

                <table id="Daftar_Chapter">
                    <tbody class="_3Rsjq" data-test="chapter-table">
                        <tr>
                            <th class="judulseries">Chapter</th>
                            <th class="tanggalseries"> Diperbarui</th>
                        </tr>
                        <?php foreach ($res['chapters'] as $c) : ?>
                            <tr>
                                <td class="judulseries">
                                    <a class="ch-link" href="<?= base_url() . "/ch" . $c['link'] ?>" title="<?= $c['chapter'] ?>" itemprop="url">Chapter <?= $c['chapter'] ?> </a>
                                </td>
                                <td class="tanggalseries"> <?= $c['released'] ?> </td>
                            </tr>
                        <?php endforeach ?>


                    </tbody>
                </table>
            </section>
            <div id="iframe"><span onclick="document.getElementById('iframe').style.display = 'none';">↕ tutup</span>
                <div id="iframe2"></div>
            </div>
            <div id="continue"></div>
        </article>
    </main>
    <footer id="Footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
        <div class="perapih">
            <svg class="svg-inline--fa fa-korvue fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="korvue" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 446 512" data-fa-i2svg="">
                <path fill="currentColor" d="M386.5 34h-327C26.8 34 0 60.8 0 93.5v327.1C0 453.2 26.8 480 59.5 480h327.1c33 0 59.5-26.8 59.5-59.5v-327C446 60.8 419.2 34 386.5 34zM87.1 120.8h96v116l61.8-116h110.9l-81.2 132H87.1v-132zm161.8 272.1l-65.7-113.6v113.6h-96V262.1h191.5l88.6 130.8H248.9z"></path>
            </svg>
            <p class="cp">
                Copyright @ Komiku id. All right reserved.
            </p>
            <div class="pp">
                <a href="/page/dmca/">DMCA</a> | <a href="/page/tos/">Terms of Usage</a> | <a href="/page/privacy-policy/">Privacy Policy</a> | <a href="/page/contact-us/">Contact Us</a>
            </div>
        </div>
    </footer>
    <div id="Navbawah">
        <div class="perapih">
            <div class="navb">
                <a href="/daftar-komik/"><svg class="svg-inline--fa fa-korvue fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="korvue" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 446 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M386.5 34h-327C26.8 34 0 60.8 0 93.5v327.1C0 453.2 26.8 480 59.5 480h327.1c33 0 59.5-26.8 59.5-59.5v-327C446 60.8 419.2 34 386.5 34zM87.1 120.8h96v116l61.8-116h110.9l-81.2 132H87.1v-132zm161.8 272.1l-65.7-113.6v113.6h-96V262.1h191.5l88.6 130.8H248.9z"></path>
                    </svg> <span>Daftar Isi</span></a>
            </div>
            <div class="navb">
                <a href="/bookmark/bookmark.html"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-bookmark fa-w-12">
                        <path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z" class=""></path>
                    </svg><span>Bookmark</span></a>
            </div>
            <div class="navb">
                <a href="/bookmark/history.html"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="history" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-history fa-w-16">
                        <path fill="currentColor" d="M504 255.531c.253 136.64-111.18 248.372-247.82 248.468-59.015.042-113.223-20.53-155.822-54.911-11.077-8.94-11.905-25.541-1.839-35.607l11.267-11.267c8.609-8.609 22.353-9.551 31.891-1.984C173.062 425.135 212.781 440 256 440c101.705 0 184-82.311 184-184 0-101.705-82.311-184-184-184-48.814 0-93.149 18.969-126.068 49.932l50.754 50.754c10.08 10.08 2.941 27.314-11.313 27.314H24c-8.837 0-16-7.163-16-16V38.627c0-14.254 17.234-21.393 27.314-11.314l49.372 49.372C129.209 34.136 189.552 8 256 8c136.81 0 247.747 110.78 248 247.531zm-180.912 78.784l9.823-12.63c8.138-10.463 6.253-25.542-4.21-33.679L288 256.349V152c0-13.255-10.745-24-24-24h-16c-13.255 0-24 10.745-24 24v135.651l65.409 50.874c10.463 8.137 25.541 6.253 33.679-4.21z" class=""></path>
                    </svg><span>Histori</span></a>
            </div>
            <div class="navb">
                <a href="/bookmark/rakbuku.html"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-user-circle fa-w-16">
                        <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z" class=""></path>
                    </svg><span>Rak Buku</span></a>
            </div>
        </div>
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167504155-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-167504155-1');
    </script>
    <script>
        var
            divs = document.getElementsByClassName('svg');

        [].slice.call(divs).forEach(function(div) {
            if (div.classList.contains("hot")) {
                div.innerHTML = '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="hotjar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-hotjar fa-w-14"><path fill="currentColor" d="M414.9 161.5C340.2 29 121.1 0 121.1 0S222.2 110.4 93 197.7C11.3 252.8-21 324.4 14 402.6c26.8 59.9 83.5 84.3 144.6 93.4-29.2-55.1-6.6-122.4-4.1-129.6 57.1 86.4 165 0 110.8-93.9 71 15.4 81.6 138.6 27.1 215.5 80.5-25.3 134.1-88.9 148.8-145.6 15.5-59.3 3.7-127.9-26.3-180.9z" class=""></path></svg>';
            } else if (div.classList.contains("rekomendasi")) {
                div.innerHTML = '<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="thumbs-up" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M466.27 286.69C475.04 271.84 480 256 480 236.85c0-44.015-37.218-85.58-85.82-85.58H357.7c4.92-12.81 8.85-28.13 8.85-46.54C366.55 31.936 328.86 0 271.28 0c-61.607 0-58.093 94.933-71.76 108.6-22.747 22.747-49.615 66.447-68.76 83.4H32c-17.673 0-32 14.327-32 32v240c0 17.673 14.327 32 32 32h64c14.893 0 27.408-10.174 30.978-23.95 44.509 1.001 75.06 39.94 177.802 39.94 7.22 0 15.22.01 22.22.01 77.117 0 111.986-39.423 112.94-95.33 13.319-18.425 20.299-43.122 17.34-66.99 9.854-18.452 13.664-40.343 8.99-62.99zm-61.75 53.83c12.56 21.13 1.26 49.41-13.94 57.57 7.7 48.78-17.608 65.9-53.12 65.9h-37.82c-71.639 0-118.029-37.82-171.64-37.82V240h10.92c28.36 0 67.98-70.89 94.54-97.46 28.36-28.36 18.91-75.63 37.82-94.54 47.27 0 47.27 32.98 47.27 56.73 0 39.17-28.36 56.72-28.36 94.54h103.99c21.11 0 37.73 18.91 37.82 37.82.09 18.9-12.82 37.81-22.27 37.81 13.489 14.555 16.371 45.236-5.21 65.62zM88 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path></svg>';
            } else if (div.classList.contains("berwarna")) {
                div.innerHTML = '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="palette" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M204.3 5C104.9 24.4 24.8 104.3 5.2 203.4c-37 187 131.7 326.4 258.8 306.7 41.2-6.4 61.4-54.6 42.5-91.7-23.1-45.4 9.9-98.4 60.9-98.4h79.7c35.8 0 64.8-29.6 64.9-65.3C511.5 97.1 368.1-26.9 204.3 5zM96 320c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm32-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path></svg>';
            } else if (div.classList.contains("eye")) {
                div.innerHTML = '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-eye fa-w-18"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z" class=""></path></svg>';
            }
        });
    </script>
    <script>
        function bookmark(bookmark) {
            var data = [];
            data[0] = "Black Clover";
            data[1] = '/manga/black-clover-indonesia/';
            data[2] = 'https://cover.komiku.id/wp-content/uploads/Manga-Black-Clover.jpg';
            if (bookmark == 'subscribe') {
                localStorage.setItem('fav_1750757', JSON.stringify(data));
                $("#bookmark").css("display", "none");
                $("#unbookmark").css("display", "block");
                alert("Berhasil kamu Bookmark, cek di menu Rak Buku.");
            } else if (bookmark == 'bacananti') {
                localStorage.setItem('bc_1750757', JSON.stringify(data));
                $("#nanti").css("display", "none");
                $("#unnanti").css("display", "block");
                alert("Berhasil kamu tambahkan, cek di menu Rak Bukuu.");
            } else {
                localStorage.setItem(bookmark + '_1750757', JSON.stringify(data));
                $("#" + bookmark).css("display", "none");
                $("#un" + bookmark).css("display", "block");
                alert("Berhasil kamu tambahkan, cek di menu Rak Buku.");
            }
        }

        function unbookmark(bookmark) {
            if (bookmark == 'subscribe') {
                localStorage.removeItem('fav_1750757');
                $("#unbookmark").css("display", "none");
                $("#bookmark").css("display", "block");
            } else if (bookmark == 'bacananti') {
                localStorage.removeItem('bc_1750757');
                $("#unnanti").css("display", "none");
                $("#nanti").css("display", "block");
            } else {
                localStorage.removeItem(bookmark + '_1750757');
                $("#un" + bookmark).css("display", "none");
                $("#" + bookmark).css("display", "block");
            }
        }
        if (null != localStorage.getItem("fav_1750757")) {
            $("#bookmark").css("display", "none");
            $("#unbookmark").css("display", "block");
        }
        if (null != localStorage.getItem("bc_1750757")) {
            $("#nanti").css("display", "none");
            $("#unnanti").css("display", "block");
        }

        function baru() {
            var x1 = document.getElementById("baru");
            var x2 = document.getElementById("baru2");
            if (x1.classList.contains('ngeklik')) {
                x1.classList.remove("ngeklik");
                x2.innerHTML = "+ Baru";
                document.getElementById("baru3").style.display = "none";
            } else {
                x1.classList.add("ngeklik");
                x2.innerHTML = "x Tutup";
                document.getElementById("baru3").style.display = "block";
            }
        }

        function add() {
            var nma = $("#bar").val(),
                idnma = nma.replace(/[^a-z1-9]/gi, ''),
                dataid = "'" + idnma + "'";
            if (localStorage.getItem("favorit") === null) {
                var a = [idnma];
                localStorage.setItem('favorit', JSON.stringify(a));
                document.getElementById('favorit').innerHTML += '<div class="tombol" style="display:none" id="' + idnma + '" onclick="bookmark(' + dataid + ')">' + nma + '</div>';
                document.getElementById('favorit').innerHTML += '<div class="tombol nono" id="un' + idnma + '" onclick="unbookmark(' + dataid + ')">x ' + nma + '</div>';
                var b = [];
                b[0] = idnma;
                b[1] = nma;
                localStorage.setItem('tipe_' + idnma, JSON.stringify(b));
                document.getElementById("baru3").style.display = "none";
                document.getElementById("baru2").innerHTML = "+ Baru";
                bookmark(idnma);
            } else {
                var a = [];
                a = JSON.parse(localStorage.getItem('favorit')) || [];
                if (a.includes(idnma)) {
                    alert("Nama sudah kamu buat sebelumnya, pakai nama lain!");
                } else {
                    a.unshift(idnma);
                    document.getElementById('favorit').innerHTML += '<div class="tombol" style="display:none" id="' + idnma + '" onclick="bookmark(' + dataid + ')">' + nma + '</div>';
                    document.getElementById('favorit').innerHTML += '<div class="tombol nono" id="un' + idnma + '" onclick="unbookmark(' + dataid + ')">x ' + nma + '</div>';
                    var b = [];
                    b[0] = idnma;
                    b[1] = nma;
                    localStorage.setItem('tipe_' + idnma, JSON.stringify(b));
                    document.getElementById("baru3").style.display = "none";
                    document.getElementById("baru2").innerHTML = "+ Baru";
                    bookmark(idnma);
                }
                localStorage.setItem('favorit', JSON.stringify(a));
            }
        }
        var c = [];
        c = JSON.parse(localStorage.getItem('favorit')) || [];
        c.forEach(myFunction);

        function myFunction(item, index) {
            var datakomik = JSON.parse(localStorage.getItem('tipe_' + item)),
                dataid = "'" + datakomik[0] + "'";
            document.getElementById('favorit').innerHTML += '<div class="tombol" id="' + datakomik[0] + '" onclick="bookmark(' + dataid + ')">' + datakomik[1] + '</div>';
            document.getElementById('favorit').innerHTML += '<div class="tombol nono" id="un' + datakomik[0] + '" onclick="unbookmark(' + dataid + ')">x ' + datakomik[1] + '</div>';
            if (null != localStorage.getItem(datakomik[0] + "_1750757")) {
                document.getElementById(datakomik[0]).style.display = "none";
            } else {
                document.getElementById('un' + datakomik[0]).style.display = "none";
            }

        }
    </script>
    <script>
        if (null != localStorage.getItem("idpost_1750757")) {
            var datakomik = JSON.parse(localStorage.getItem("idpost_1750757"));
            var linkch = datakomik[4].replace("/ch/ch/", "/ch/");
            document.getElementById("continue").innerHTML = '<div class="lanjut"><h2>History Kamu!</h2><p>Terakhir kamu baca: <b>' + datakomik[1] + "</b> gambar ke " + datakomik[2] + " dari " + datakomik[3] + ' gambar.</p><div class="cen"><a href="' + linkch + '">Lanjut →</a></div></div>'
        }
    </script>
    <script>
        function addCode() {
            document.getElementById("iframe2").innerHTML = '<iframe src="https://komiku.co.id/manga/black-clover-indonesia/?komentar"></iframe>', document.getElementById("iframe").style.display = "block"
        }
    </script>
</body>

</html>