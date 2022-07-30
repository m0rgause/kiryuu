<?php
// error_reporting(0);
include_once "../../config.php";
include_once "../../template/header.php";
include_once "../../lib/Kiryu.class.php";
// $q = isset($_GET['q']) ? $_GET['q'] : die();
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$data = $p->comicType("comic", $page);

// print_r($data);
// die();

?>

<body class="home" id="body">
    <?php include_once "../../template/nav.php" ?>

    <main class="main" style="margin-top: 20px;">
        <div class="konten">

            <section id="Terbaru" style="margin-bottom: 100px;">
                <div class="ls4w">
                    <?php foreach ($data as $newR) : ?>
                        <div class="ls4">
                            <div class="ls4v"> <a href="<?= base_url() . $newR['link'] ?>"> <img class="lazy" src="" data-src="<?= $newR['image'] ?>?resize=240,171"> </a>
                                <div class="vw">
                                    <?php foreach ($newR['features'] as $f) : ?>
                                        <span class="svg <?= $f ?>"></span>
                                    <?php endforeach ?>

                                </div>
                            </div>
                            <div class="ls4j">
                                <h4>
                                    <a href="<?= base_url() . $newR['link'] ?>"><?= $newR['title'] ?></a>
                                </h4>
                                <span class="ls4s">
                                    <?= $newR['type'] ?>
                                </span>
                                <br>
                                <a href="<?= base_url() . $newR['link'] ?>" class="ls24">
                                    <?= $newR['last_chapter'] ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
                <div style="margin-left:100px; margin-right:100px;">
                    <a style="float: right;" href="<?= base_url() . "/comic?page=" . $page + 1 ?>"> Next Page</a>
                    <?php if ($page > 1) : ?>
                        <a style="float: left;" href="<?= base_url() . "/comic?page=" . $page - 1 ?>"> Prev Page</a>
                    <?php endif ?>

                </div>
            </section>



        </div>
        <footer id="Footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
            <div class="perapih"><svg class="svg-inline--fa fa-korvue fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="korvue" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 446 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M386.5 34h-327C26.8 34 0 60.8 0 93.5v327.1C0 453.2 26.8 480 59.5 480h327.1c33 0 59.5-26.8 59.5-59.5v-327C446 60.8 419.2 34 386.5 34zM87.1 120.8h96v116l61.8-116h110.9l-81.2 132H87.1v-132zm161.8 272.1l-65.7-113.6v113.6h-96V262.1h191.5l88.6 130.8H248.9z"></path>
                </svg>
                <p class="cp">Copyright @ Komiku id. All right reserved.</p>
                <div class="pp"><a href="/page/dmca/">DMCA</a> | <a href="/page/tos/">Terms of Usage</a> | <a href="/page/privacy-policy/">Privacy Policy</a> | <a href="/page/contact-us/">Contact Us</a></div>
            </div>
        </footer>
        <div id="Navbawah">
            <div class="perapih">
                <div class="navb">
                    <a href="/daftar-komik/">
                        <svg class="svg-inline--fa fa-korvue fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="korvue" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 446 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M386.5 34h-327C26.8 34 0 60.8 0 93.5v327.1C0 453.2 26.8 480 59.5 480h327.1c33 0 59.5-26.8 59.5-59.5v-327C446 60.8 419.2 34 386.5 34zM87.1 120.8h96v116l61.8-116h110.9l-81.2 132H87.1v-132zm161.8 272.1l-65.7-113.6v113.6h-96V262.1h191.5l88.6 130.8H248.9z"></path>
                        </svg> <span>Daftar Isi</span></a>
                </div>
                <div class="navb"><a href="/bookmark/bookmark.html"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-bookmark fa-w-12">
                            <path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z" class=""></path>
                        </svg><span>Bookmark</span></a></div>
                <div class="navb"><a href="/bookmark/history.html"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="history" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-history fa-w-16">
                            <path fill="currentColor" d="M504 255.531c.253 136.64-111.18 248.372-247.82 248.468-59.015.042-113.223-20.53-155.822-54.911-11.077-8.94-11.905-25.541-1.839-35.607l11.267-11.267c8.609-8.609 22.353-9.551 31.891-1.984C173.062 425.135 212.781 440 256 440c101.705 0 184-82.311 184-184 0-101.705-82.311-184-184-184-48.814 0-93.149 18.969-126.068 49.932l50.754 50.754c10.08 10.08 2.941 27.314-11.313 27.314H24c-8.837 0-16-7.163-16-16V38.627c0-14.254 17.234-21.393 27.314-11.314l49.372 49.372C129.209 34.136 189.552 8 256 8c136.81 0 247.747 110.78 248 247.531zm-180.912 78.784l9.823-12.63c8.138-10.463 6.253-25.542-4.21-33.679L288 256.349V152c0-13.255-10.745-24-24-24h-16c-13.255 0-24 10.745-24 24v135.651l65.409 50.874c10.463 8.137 25.541 6.253 33.679-4.21z" class=""></path>
                        </svg><span>Histori</span></a></div>
                <div class="navb"><a href="/bookmark/rakbuku.html"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="svg-inline--fa fa-user-circle fa-w-16">
                            <path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z" class=""></path>
                        </svg><span>Rak Buku</span></a></div>
            </div>
        </div>

        <script>
            var divs = document.getElementsByClassName('svg');
            [].slice.call(divs).forEach(function(div) {
                if (div.classList.contains("hot")) {
                    div.innerHTML = '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="hotjar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-hotjar fa-w-14"><path fill="currentColor" d="M414.9 161.5C340.2 29 121.1 0 121.1 0S222.2 110.4 93 197.7C11.3 252.8-21 324.4 14 402.6c26.8 59.9 83.5 84.3 144.6 93.4-29.2-55.1-6.6-122.4-4.1-129.6 57.1 86.4 165 0 110.8-93.9 71 15.4 81.6 138.6 27.1 215.5 80.5-25.3 134.1-88.9 148.8-145.6 15.5-59.3 3.7-127.9-26.3-180.9z" class=""></path></svg>';
                } else if (div.classList.contains("new")) {
                    div.innerHTML = '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.688 490.688" style="enable-background:new 0 0 490.688 490.688;" xml:space="preserve"> <path style="fill:#FFC107;" d="M462.784,209.088c-7.552-5.568-17.067-12.523-18.219-17.067c0.484-8.796,2.996-17.36,7.339-25.024 c6.656-15.275,13.525-31.104,5.888-44.267c-7.637-13.163-25.003-15.296-41.707-17.067c-8.658-0.058-17.188-2.094-24.939-5.952 c-3.864-7.778-5.893-16.339-5.931-25.024c-1.877-16.704-3.819-33.984-17.067-41.707c-13.248-7.723-29.099-0.96-44.373,5.781 c-7.672,4.341-16.243,6.852-25.045,7.339c-4.608-1.237-11.541-10.667-17.067-18.219c-9.685-13.056-20.587-27.861-36.331-27.861 s-26.645,14.805-36.267,27.861c-5.589,7.573-12.523,17.067-17.067,18.24c-8.794-0.53-17.356-3.038-25.045-7.339 c-15.36-6.763-31.189-13.504-44.309-5.909s-15.317,25.003-17.195,41.813c-0.061,8.655-2.089,17.183-5.931,24.939 c-7.736,3.803-16.233,5.801-24.853,5.845c-16.725,1.877-34.027,3.819-41.728,17.067S32,151.616,38.741,166.912 c4.357,7.689,6.869,16.284,7.339,25.109c-1.237,4.608-10.667,11.563-18.219,17.067C14.805,218.688,0,229.611,0,245.355 s14.805,26.667,27.883,36.267c7.552,5.568,17.067,12.523,18.219,17.067c-0.484,8.796-2.996,17.36-7.339,25.024 c-6.656,15.275-13.525,31.104-5.888,44.267c7.637,13.163,25.003,15.296,41.707,17.067c8.658,0.058,17.188,2.094,24.939,5.952 c3.864,7.778,5.893,16.339,5.931,25.024c1.877,16.704,3.819,33.984,17.067,41.707c13.248,7.723,28.971,0.768,44.267-5.888 c7.749-4.293,16.37-6.773,25.216-7.253c4.608,1.237,11.541,10.667,17.067,18.219c9.621,13.056,20.523,27.861,36.267,27.861 s26.645-14.805,36.267-27.861c5.589-7.573,12.523-17.067,17.067-18.24c8.8,0.498,17.368,3.008,25.045,7.339 c15.275,6.656,31.104,13.483,44.245,5.909c13.141-7.573,15.317-25.003,17.195-41.728c0.061-8.655,2.089-17.183,5.931-24.939 c7.75-3.834,16.271-5.855,24.917-5.909c16.725-1.877,34.027-3.819,41.728-17.067c7.701-13.248,0.747-28.971-5.888-44.267 c-4.343-7.728-6.826-16.362-7.253-25.216c1.237-4.608,10.667-11.563,18.219-17.067c13.056-9.621,27.883-20.544,27.883-36.267 S475.861,218.688,462.784,209.088z"/><g> <path style="fill:#FAFAFA;" d="M181.333,298.688c-3.357,0-6.519-1.581-8.533-4.267L128,234.688v53.333 c0,5.891-4.776,10.667-10.667,10.667s-10.667-4.776-10.667-10.667v-85.333c0-5.891,4.776-10.667,10.667-10.667 c3.357,0,6.519,1.581,8.533,4.267l44.8,59.733v-53.333c0-5.891,4.776-10.667,10.667-10.667c5.891,0,10.667,4.776,10.667,10.667 v85.333c-0.003,4.589-2.942,8.662-7.296,10.112C183.618,298.501,182.48,298.688,181.333,298.688z"/> <path style="fill:#FAFAFA;" d="M266.667,298.688H224c-5.891,0-10.667-4.776-10.667-10.667v-85.333 c0-5.891,4.776-10.667,10.667-10.667h42.667c5.891,0,10.667,4.776,10.667,10.667c0,5.891-4.776,10.667-10.667,10.667h-32v64h32 c5.891,0,10.667,4.776,10.667,10.667S272.558,298.688,266.667,298.688z"/> <path style="fill:#FAFAFA;" d="M266.667,256.021H224c-5.891,0-10.667-4.776-10.667-10.667s4.776-10.667,10.667-10.667h42.667 c5.891,0,10.667,4.776,10.667,10.667S272.558,256.021,266.667,256.021z"/> <path style="fill:#FAFAFA;" d="M373.333,298.688c-4.597,0.006-8.681-2.934-10.133-7.296L352,257.749l-11.2,33.643 c-1.363,4.603-5.751,7.633-10.539,7.275c-4.738-0.18-8.788-3.465-9.941-8.064l-21.333-85.333 c-1.426-5.72,2.056-11.513,7.776-12 939c5.72-1.426,11.513,2.056,12.939,7.776l12.437,49.792l9.749-29.248 c2.535-5.591,9.122-8.068,14.713-5.533c2.454,1.113,4.42,3.079,5.533,5.533l9.749,29.248l12.437-49.792 c1.426-5.72,7.218-9.202,12.939-7.776c5.72,1.426,9.202,7.218,7.776,12.939l-21.333,85.333c-1.153,4.599-5.204,7.884-9.941,8.064 L373.333,298.688z"/> </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>';
                } else if (div.classList.contains("colored")) {
                    div.innerHTML = '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="palette" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M204.3 5C104.9 24.4 24.8 104.3 5.2 203.4c-37 187 131.7 326.4 258.8 306.7 41.2-6.4 61.4-54.6 42.5-91.7-23.1-45.4 9.9-98.4 60.9-98.4h79.7c35.8 0 64.8-29.6 64.9-65.3C511.5 97.1 368.1-26.9 204.3 5zM96 320c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm32-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path></svg>';
                } else if (div.classList.contains("eye")) {
                    div.innerHTML = '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-eye fa-w-18"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z" class=""></path></svg>';
                }
            });
        </script>
    </main>
    <script>
        $(document).ready(function() {
            $('.main').infiniscroll({
                pageFragment: '.konten',
                scrollBuffer: 200,
                scrollOnLoad: true,
                scrollOnLoadDistance: 400,
                scrollOnLoadSpeed: 500,
                beforeContentLoaded: function(link) {
                    $('#Footer').css('display', 'none');
                },
                afterContentLoaded: function(html) {
                    $('.weww').css('display', 'none');
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
                },
            });
        });
    </script>
</body>

</html>