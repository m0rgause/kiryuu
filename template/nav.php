<header id="header" itemscope itemtype="https://schema.org/WPHeader">
    <div class="hd2">
        <div class="perapih">
            <div class="logo">
                <a href="<?= base_url() ?>"><svg class="svg-inline--fa fa-korvue fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="korvue" role="img" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 446 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M386.5 34h-327C26.8 34 0 60.8 0 93.5v327.1C0 453.2 26.8 480 59.5 480h327.1c33 0 59.5-26.8 59.5-59.5v-327C446 60.8 419.2 34 386.5 34zM87.1 120.8h96v116l61.8-116h110.9l-81.2 132H87.1v-132zm161.8 272.1l-65.7-113.6v113.6h-96V262.1h191.5l88.6 130.8H248.9z"></path>
                    </svg><span>K Reader</span></a>
            </div>
            <form class="search_box active" id="search_box" action="<?= base_url() . "/search" ?>" method="GET">
                <input value="" name="q" id="q" placeholder="" type="text">
                <input class="search_icon" value="Cari" type="submit">
            </form>
        </div>
    </div>
    <nav itemscope="" itemtype="https://schema.org/SiteNavigationElement" role="navigation">
        <ul>
            <li itemprop="name"><a itemprop="url" href="<?= base_url() . "/list/manga" ?>"><span>Manga</span></a></li>
            <li itemprop="name"><a itemprop="url" href="<?= base_url() . "/list/manhua" ?>"><span>Manhua</span></a></li>
            <li itemprop="name"><a itemprop="url" href="<?= base_url() . "/list/manhwa" ?>"><span>Manhwa</span></a></li>
            <li itemprop="name"><a itemprop="url" href="<?= base_url() . "/list/comic" ?>"><span>Comic</span></a></li>
            <li itemprop="name"><a itemprop="url" href="<?= base_url() . "/list/novel" ?>"><span>Novel</span></a></li>
        </ul>
    </nav>
</header>