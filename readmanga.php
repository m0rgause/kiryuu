<?php
include_once "config.php";
include_once "template/header.php";
include_once "lib/Kiryu.class.php";

$str = isset($_GET['komik']) ? $_GET['komik'] : '';
$data = $p->mangaReader($str);

?>

<body class="chapter" id="body">
    <?php include_once 'template/nav.php'; ?>
    <main style="margin-top:45px" class="main">

        <article class="content">
            <header id="Judul">
                <h1>
                    <?= $data['title'] ?>
                </h1>
            </header>
            <section id="Baca_Komik">
                <p style="text-align:center" class="ayeaye">
                    <span class="asulu" style="display:none"><b>FULL SCREEN</b> di HP gak bisa zoom gambar (bawaan browser).</span>
                </p>
                <?php $i = 0; ?>
                <?php foreach ($data['images'] as $img) : ?>
                    <img src="<?= str_replace("cdn.statically.io/img/kiryuu/", "", $img) ?>" alt="<?= $data['title'] . $i++ ?>" class="klazy ww" id="<?= $i ?>">
                <?php endforeach ?>
            </section>


            <?php if ($data['next_chapter']) : ?>
                <header id="Judul" class="chaba" style="text-align: center; border-radius: 10px; margin-bottom: 20px;">
                    <h1> <?= $data['title'] ?> </h1>
                    <img src="https://komiku.id/asset/img/Loading.gif">
                    <p>
                        Otomatis lanjut ke Chapter berikutnye. Tunggu beberapa detik, kalau lama loadingnya, pindah manual aja klik tombol dibawah.
                    </p>
                    <a href="<?= base_url() . "/ch" . $data['next_chapter'] ?>" class="buttnext">Next Chapter</a>
                </header>
                <div class="nextch" data="<?= $data['next_chapter'] ?>"></div>
            <?php endif ?>
        </article>

        <div id="halamannya" halaman="111"></div>

    </main>
    <?php
    include_once "template/footer.php";
    ?>
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".main").infiniteScroll({
                append: '.content',
                path: '.buttnext'
            })

            var lazyloadImages;
            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll('img.klazy');
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.classList.remove("klazy");
                            imageObserver.unobserve(image);
                            idnya = image.getAttribute('id');
                            // console.log(idnya);
                            if (idnya != null) {
                                var data = []
                                data[0] = "<?= $data['title'] ?>"
                                data[1] = "Chapter <?= $data['chapter'] ?>"
                                data[2] = idnya
                                data[3] = "<?= $data['poster'] ?>"
                                data[4] = "<?= $str ?>#" + idnya
                                localStorage.setItem('idpost_<?= $data['post_id'] ?>', JSON.stringify(data));
                                console.log(idnya);
                                if (idnya == 1) {
                                    console.log("Asdasd");
                                    if (localStorage.getItem("history") === null) {
                                        var a = ["idpost_<?= $data['post_id'] ?>"];
                                        localStorage.setItem('history', JSON.stringify(a));
                                    } else {
                                        var a = [];
                                        a = JSON.parse(localStorage.getItem('history')) || [];
                                        if (a.includes('idpost_<?= $data['post_id'] ?>')) {
                                            a.unshift(a.splice(a.indexOf('idpost_<?= $data['post_id'] ?>'), 1)[0]);
                                        } else {
                                            a.unshift('idpost_<?= $data['post_id'] ?>');
                                        }
                                        localStorage.setItem("history", JSON.stringify(a));
                                    }
                                }
                            }
                        }
                    })
                })
                lazyloadImages.forEach(function(image) {
                    imageObserver.observe(image);
                })
            }

            console.log(localStorage.getItem("history"));

        })
    </script>

    <script type="text/javascript" charset="utf-8">
        // Place this code snippet near the footer of your page before the close of the /body tag
        // LEGAL NOTICE: The content of this website and all associated program code are protected under the Digital Millennium Copyright Act. Intentionally circumventing this code may constitute a violation of the DMCA.

        eval(function(p, a, c, k, e, d) {
            e = function(c) {
                return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
            };
            if (!''.replace(/^/, String)) {
                while (c--) {
                    d[e(c)] = k[c] || e(c)
                }
                k = [function(e) {
                    return d[e]
                }];
                e = function() {
                    return '\\w+'
                };
                c = 1
            };
            while (c--) {
                if (k[c]) {
                    p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c])
                }
            }
            return p
        }(';q K=\'\',28=\'1V\';1N(q i=0;i<12;i++)K+=28.U(B.I(B.J()*28.E));q 2q=2,2S=5d,2T=5e,2o=64,2z=C(t){q o=!1,i=C(){z(k.1g){k.2Z(\'2L\',e);D.2Z(\'1O\',e)}N{k.2W(\'2M\',e);D.2W(\'23\',e)}},e=C(){z(!o&&(k.1g||5i.2w===\'1O\'||k.2V===\'2K\')){o=!0;i();t()}};z(k.2V===\'2K\'){t()}N z(k.1g){k.1g(\'2L\',e);D.1g(\'1O\',e)}N{k.2N(\'2M\',e);D.2N(\'23\',e);q n=!1;34{n=D.5o==5q&&k.1U}2m(a){};z(n&&n.2t){(C r(){z(o)F;34{n.2t(\'14\')}2m(e){F 4O(r,50)};o=!0;i();t()})()}}};D[\'\'+K+\'\']=(C(){q t={t$:\'1V+/=\',4P:C(e){q r=\'\',d,n,o,c,s,l,i,a=0;e=t.e$(e);1e(a<e.E){d=e.16(a++);n=e.16(a++);o=e.16(a++);c=d>>2;s=(d&3)<<4|n>>4;l=(n&15)<<2|o>>6;i=o&63;z(2f(n)){l=i=64}N z(2f(o)){i=64};r=r+S.t$.U(c)+S.t$.U(s)+S.t$.U(l)+S.t$.U(i)};F r},V:C(e){q n=\'\',d,l,c,s,a,i,r,o=0;e=e.1A(/[^A-4T-4U-9\\+\\/\\=]/g,\'\');1e(o<e.E){s=S.t$.1F(e.U(o++));a=S.t$.1F(e.U(o++));i=S.t$.1F(e.U(o++));r=S.t$.1F(e.U(o++));d=s<<2|a>>4;l=(a&15)<<4|i>>2;c=(i&3)<<6|r;n=n+O.Q(d);z(i!=64){n=n+O.Q(l)};z(r!=64){n=n+O.Q(c)}};n=t.n$(n);F n},e$:C(t){t=t.1A(/;/g,\';\');q n=\'\';1N(q o=0;o<t.E;o++){q e=t.16(o);z(e<1q){n+=O.Q(e)}N z(e>55&&e<56){n+=O.Q(e>>6|6c);n+=O.Q(e&63|1q)}N{n+=O.Q(e>>12|2D);n+=O.Q(e>>6&63|1q);n+=O.Q(e&63|1q)}};F n},n$:C(t){q o=\'\',e=0,n=6h=1o=0;1e(e<t.E){n=t.16(e);z(n<1q){o+=O.Q(n);e++}N z(n>6j&&n<2D){1o=t.16(e+1);o+=O.Q((n&31)<<6|1o&63);e+=2}N{1o=t.16(e+1);2h=t.16(e+2);o+=O.Q((n&15)<<12|(1o&63)<<6|2h&63);e+=3}};F o}};q r=[\'5Z==\',\'5F\',\'4H=\',\'5H\',\'5I\',\'5J=\',\'5T=\',\'5V=\',\'59\',\'4G\',\'39=\',\'3e=\',\'5G\',\'6s\',\'49=\',\'48\',\'47=\',\'46=\',\'45=\',\'44=\',\'43=\',\'42=\',\'41==\',\'40==\',\'3Z==\',\'3Y==\',\'3X=\',\'3V\',\'3H\',\'3U\',\'3T\',\'3S\',\'3R\',\'3Q==\',\'3P=\',\'3O=\',\'3N=\',\'3M==\',\'3L=\',\'3K\',\'3J=\',\'3I=\',\'4a==\',\'3W=\',\'4b==\',\'4s==\',\'4F=\',\'4E=\',\'4D\',\'4C==\',\'4B==\',\'4A\',\'4z==\',\'4y=\'],y=B.I(B.J()*r.E),Y=t.V(r[y]),w=Y,M=1,W=\'#4x\',a=\'#4w\',v=\'#4v\',g=\'#4u\',L=\'\',b=\'4t\',p=\'4r 4d 4q 4p 4o??\',f=\'3F 4n 4m 2C 4l 4k 4j 1O 4i 4h 4g.\',s=\'4f 4e, 4c 3G 3k!\',o=0,u=0,n=\'3E.38\',l=0,Z=e()+\'.2y\';C h(t){z(t)t=t.1C(t.E-15);q o=k.2B(\'3b\');1N(q n=o.E;n--;){q e=O(o[n].1D);z(e)e=e.1C(e.E-15);z(e===t)F!0};F!1};C m(t){z(t)t=t.1C(t.E-15);q e=k.3g;x=0;1e(x<e.E){1h=e[x].1Q;z(1h)1h=1h.1C(1h.E-15);z(1h===t)F!0;x++};F!1};C e(t){q n=\'\',o=\'1V\';t=t||30;1N(q e=0;e<t;e++)n+=o.U(B.I(B.J()*o.E));F n};C i(o){q i=[\'3h\',\'3u==\',\'3D\',\'3i\',\'2I\',\'3A==\',\'3w=\',\'3v==\',\'3t=\',\'3r==\',\'3q==\',\'3p==\',\'3n\',\'3m\',\'3l\',\'2I\'],a=[\'2P=\',\'3C==\',\'3o==\',\'3s==\',\'3x=\',\'3y\',\'3z=\',\'3B=\',\'2P=\',\'3j\',\'3f==\',\'3d\',\'3a==\',\'3c==\',\'37==\',\'35=\'];x=0;1H=[];1e(x<o){c=i[B.I(B.J()*i.E)];d=a[B.I(B.J()*a.E)];c=t.V(c);d=t.V(d);q r=B.I(B.J()*2)+1;z(r==1){n=\'//\'+c+\'/\'+d}N{n=\'//\'+c+\'/\'+e(B.I(B.J()*20)+4)+\'.2y\'};1H[x]=1X 26();1H[x].1Y=C(){q t=1;1e(t<7){t++}};1H[x].1D=n;x++}};C X(t){};F{2F:C(t,a){z(5Y k.H==\'5X\'){F};q o=\'0.1\',a=w,e=k.1a(\'1x\');e.1l=a;e.j.1m=\'1L\';e.j.14=\'-1n\';e.j.T=\'-1n\';e.j.1p=\'2a\';e.j.11=\'5W\';q d=k.H.32,r=B.I(d.E/2);z(r>15){q n=k.1a(\'29\');n.j.1m=\'1L\';n.j.1p=\'1t\';n.j.11=\'1t\';n.j.T=\'-1n\';n.j.14=\'-1n\';k.H.5U(n,k.H.32[r]);n.1c(e);q i=k.1a(\'1x\');i.1l=\'2R\';i.j.1m=\'1L\';i.j.14=\'-1n\';i.j.T=\'-1n\';k.H.1c(i)}N{e.1l=\'2R\';k.H.1c(e)};l=5S(C(){z(e){t((e.1W==0),o);t((e.21==0),o);t((e.1K==\'2E\'),o);t((e.1P==\'2g\'),o);t((e.1I==0),o)}N{t(!0,o)}},27)},1G:C(e,c){z((e)&&(o==0)){o=1;D[\'\'+K+\'\'].1B();D[\'\'+K+\'\'].1G=C(){F}}N{q f=t.V(\'5R\'),u=k.5Q(f);z((u)&&(o==0)){z((2S%3)==0){q l=\'5P=\';l=t.V(l);z(h(l)){z(u.1E.1A(/\\s/g,\'\').E==0){o=1;D[\'\'+K+\'\'].1B()}}}};q y=!1;z(o==0){z((2T%3)==0){z(!D[\'\'+K+\'\'].2l){q d=[\'5O==\',\'5M==\',\'5B=\',\'5L=\',\'5K=\'],m=d.E,a=d[B.I(B.J()*m)],r=a;1e(a==r){r=d[B.I(B.J()*m)]};a=t.V(a);r=t.V(r);i(B.I(B.J()*2)+1);q n=1X 26(),s=1X 26();n.1Y=C(){i(B.I(B.J()*2)+1);s.1D=r;i(B.I(B.J()*2)+1)};s.1Y=C(){o=1;i(B.I(B.J()*3)+1);D[\'\'+K+\'\'].1B()};n.1D=a;z((2o%3)==0){n.23=C(){z((n.11<8)&&(n.11>0)){D[\'\'+K+\'\'].1B()}}};i(B.I(B.J()*3)+1);D[\'\'+K+\'\'].2l=!0};D[\'\'+K+\'\'].1G=C(){F}}}}},1B:C(){z(u==1){q R=2d.5N(\'2r\');z(R>0){F!0}N{2d.61(\'2r\',(B.J()+1)*27)}};q h=\'6r==\';h=t.V(h);z(!m(h)){q c=k.1a(\'6q\');c.1T(\'6p\',\'6o\');c.1T(\'2w\',\'1f/6n\');c.1T(\'1Q\',h);k.2B(\'6l\')[0].1c(c)};6k(l);k.H.1E=\'\';k.H.j.17+=\'P:1t !13\';k.H.j.17+=\'1z:1t !13\';q Z=k.1U.21||D.2J||k.H.21,y=D.6i||k.H.1W||k.1U.1W,r=k.1a(\'1x\'),M=e();r.1l=M;r.j.1m=\'2p\';r.j.14=\'0\';r.j.T=\'0\';r.j.11=Z+\'1w\';r.j.1p=y+\'1w\';r.j.2i=W;r.j.24=\'6g\';k.H.1c(r);q d=\'<a 1Q="6f://6e.6d" j="G-19:10.6b;G-1k:1j-1i;1b:6a;">69 68 67 62 1Z 2C 5A</a>\';d=d.1A(\'5z\',e());d=d.1A(\'5y\',e());q i=k.1a(\'1x\');i.1E=d;i.j.1m=\'1L\';i.j.1y=\'1J\';i.j.14=\'1J\';i.j.11=\'54\';i.j.1p=\'53\';i.j.24=\'2n\';i.j.1I=\'.6\';i.j.2G=\'2H\';i.1g(\'51\',C(){n=n.4Z(\'\').4Y().4X(\'\');D.2u.1Q=\'//\'+n});k.1R(M).1c(i);q o=k.1a(\'1x\'),X=e();o.1l=X;o.j.1m=\'2p\';o.j.T=y/7+\'1w\';o.j.4S=Z-4R+\'1w\';o.j.4Q=y/3.5+\'1w\';o.j.2i=\'#4N\';o.j.24=\'2n\';o.j.17+=\'G-1k: "4M 4L", 1r, 1s, 1j-1i !13\';o.j.17+=\'4K-1p: 57 !13\';o.j.17+=\'G-19: 4V !13\';o.j.17+=\'1f-1v: 1u !13\';o.j.17+=\'1z: 58 !13\';o.j.1K+=\'1Z\';o.j.2Q=\'1J\';o.j.5m=\'1J\';o.j.5x=\'2s\';k.H.1c(o);o.j.5v=\'1t 5u 5t -5s 5r(0,0,0,0.3)\';o.j.1P=\'2x\';q w=30,Y=22,x=18,L=18;z((D.2J<2U)||(5p.11<2U)){o.j.2O=\'50%\';o.j.17+=\'G-19: 5l !13\';o.j.2Q=\'5k;\';i.j.2O=\'65%\';q w=22,Y=18,x=12,L=12};o.1E=\'<2X j="1b:#5j;G-19:\'+w+\'1M;1b:\'+a+\';G-1k:1r, 1s, 1j-1i;G-1S:5h;P-T:1d;P-1y:1d;1f-1v:1u;">\'+b+\'</2X><33 j="G-19:\'+Y+\'1M;G-1S:5g;G-1k:1r, 1s, 1j-1i;1b:\'+a+\';P-T:1d;P-1y:1d;1f-1v:1u;">\'+p+\'</33><5f j=" 1K: 1Z;P-T: 0.2Y;P-1y: 0.2Y;P-14: 2b;P-2A: 2b; 2k:5c 5b #4I; 11: 25%;1f-1v:1u;"><p j="G-1k:1r, 1s, 1j-1i;G-1S:2j;G-19:\'+x+\'1M;1b:\'+a+\';1f-1v:1u;">\'+f+\'</p><p j="P-T:5a;"><29 5n="S.j.1I=.9;" 5w="S.j.1I=1;"  1l="\'+e()+\'" j="2G:2H;G-19:\'+L+\'1M;G-1k:1r, 1s, 1j-1i; G-1S:2j;2k-4J:2s;1z:1d;4W-1b:\'+v+\';1b:\'+g+\';1z-14:2a;1z-2A:2a;11:60%;P:2b;P-T:1d;P-1y:1d;" 6m="D.2u.66();">\'+s+\'</29></p>\'}}})();D.2v=C(t,e){q n=5C.5D,o=D.5E,r=n(),i,a=C(){n()-r<e?i||o(a):t()};o(a);F{36:C(){i=1}}};q 2e;z(k.H){k.H.j.1P=\'2x\'};2z(C(){z(k.1R(\'2c\')){k.1R(\'2c\').j.1P=\'2E\';k.1R(\'2c\').j.1K=\'2g\'};2e=D.2v(C(){D[\'\'+K+\'\'].2F(D[\'\'+K+\'\'].1G,D[\'\'+K+\'\'].52)},2q*27)});', 62, 401, '|||||||||||||||||||style|document||||||var|||||||||if||Math|function|window|length|return|font|body|floor|random|LeXmtSznoeis|||else|String|margin|fromCharCode||this|top|charAt|decode||||||width||important|left||charCodeAt|cssText||size|createElement|color|appendChild|10px|while|text|addEventListener|thisurl|serif|sans|family|id|position|5000px|c2|height|128|Helvetica|geneva|0px|center|align|px|DIV|bottom|padding|replace|SgqPtJITXX|substr|src|innerHTML|indexOf|oqidMPAlxW|spimg|opacity|30px|display|absolute|pt|for|load|visibility|href|getElementById|weight|setAttribute|documentElement|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|clientHeight|new|onerror|block||clientWidth||onload|zIndex||Image|1000|LmnXoHBFRh|div|60px|auto|babasbmsgx|sessionStorage|JqLLkkuDCk|isNaN|none|c3|backgroundColor|300|border|ranAlready|catch|10000|hzYwjNTsCZ|fixed|wpdNfxwNqt|babn|15px|doScroll|location|FgMITRfqFw|type|visible|jpg|beLkiyaIJx|right|getElementsByTagName|adblock|224|hidden|YEoKOxiOfR|cursor|pointer|cGFydG5lcmFkcy55c20ueWFob28uY29t|innerWidth|complete|DOMContentLoaded|onreadystatechange|attachEvent|zoom|ZmF2aWNvbi5pY28|marginLeft|banner_ad|mKXYtRQzhw|VRMGDXRXBu|640|readyState|detachEvent|h3|5em|removeEventListener|||childNodes|h1|try|YWR2ZXJ0aXNlbWVudC0zNDMyMy5qcGc|clear|d2lkZV9za3lzY3JhcGVyLmpwZw|kcolbdakcolb|YWQtY29udGFpbmVyLTE|YmFubmVyX2FkLmdpZg|script|bGFyZ2VfYmFubmVyLmdpZg|ZmF2aWNvbjEuaWNv|YWQtY29udGFpbmVyLTI|c3F1YXJlLWFkLnBuZw|styleSheets|YWRuLmViYXkuY29t|YWQuZm94bmV0d29ya3MuY29t|YWQtbGFyZ2UucG5n|matiin|YXMuaW5ib3guY29t|YWRzYXR0LmVzcG4uc3RhcndhdmUuY29t|YWRzYXR0LmFiY25ld3Muc3RhcndhdmUuY29t|NDY4eDYwLmpwZw|YWRzLnp5bmdhLmNvbQ|YWRzLnlhaG9vLmNvbQ|cHJvbW90ZS5wYWlyLmNvbQ|NzIweDkwLmpwZw|Y2FzLmNsaWNrYWJpbGl0eS5jb20|YWQubWFpbC5ydQ|YWR2ZXJ0aXNpbmcuYW9sLmNvbQ|YWdvZGEubmV0L2Jhbm5lcnM|c2t5c2NyYXBlci5qcGc|MTM2N19hZC1jbGllbnRJRDI0NjQuanBn|YWRjbGllbnQtMDAyMTQ3LWhvc3QxLWJhbm5lci1hZC5qcGc|YS5saXZlc3BvcnRtZWRpYS5ldQ|Q0ROLTMzNC0xMDktMTM3eC1hZC1iYW5uZXI|YmFubmVyLmpwZw|anVpY3lhZHMuY29t|moc|Mohon|saya|RGl2QWQy|YWRiYW5uZXI|YWRCYW5uZXI|YmFubmVyX2Fk|YWRUZWFzZXI|Z2xpbmtzd3JhcHBlcg|QWRDb250YWluZXI|QWRCb3gxNjA|QWREaXY|QWRJbWFnZQ|RGl2QWRD|RGl2QWRC|RGl2QWRB|RGl2QWQz|RGl2QWQx|YmFubmVyYWQ|RGl2QWQ|QWRzX2dvb2dsZV8wNA|QWRzX2dvb2dsZV8wMw|QWRzX2dvb2dsZV8wMg|QWRzX2dvb2dsZV8wMQ|QWRMYXllcjI|QWRMYXllcjE|QWRGcmFtZTQ|QWRGcmFtZTM|QWRGcmFtZTI|QWRGcmFtZTE|QWRBcmVh|QWQ3Mjh4OTA|YWRBZA|IGFkX2JveA|sudah|anda|minn|Okee|ini|halaman|ulang|kemudian|kamu|browser|nonaktifkan|di|ya|Adblock|menggunakan|Keliatannya|YWRfY2hhbm5lbA|Haii|FFFFFF|adb8ff|777777|EEEEEE|c3BvbnNvcmVkX2xpbms|b3V0YnJhaW4tcGFpZA|Z29vZ2xlX2Fk|YWRzZW5zZQ|cG9wdXBhZA|YWRzbG90|YmFubmVyaWQ|YWRzZXJ2ZXI|YWQtY29udGFpbmVy|YWQtZnJhbWU|CCC|radius|line|Black|Arial|fff|setTimeout|encode|minHeight|120|minWidth|Za|z0|16pt|background|join|reverse|split||click|KocUzIsrPv|40px|160px|127|2048|normal|12px|YWQtZm9vdGVy|35px|solid|1px|295|229|hr|500|200|event|999|45px|18pt|marginRight|onmouseover|frameElement|screen|null|rgba|8px|24px|14px|boxShadow|onmouseout|borderRadius|FILLVECTID2|FILLVECTID1|easily|Ly9hZHZlcnRpc2luZy55YWhvby5jb20vZmF2aWNvbi5pY28|Date|now|requestAnimationFrame|YWRCYW5uZXJXcmFw|QWQzMDB4MTQ1|YWQtaGVhZGVy|YWQtaW1n|YWQtaW5uZXI|Ly93d3cuZG91YmxlY2xpY2tieWdvb2dsZS5jb20vZmF2aWNvbi5pY28|Ly9hZHMudHdpdHRlci5jb20vZmF2aWNvbi5pY28|Ly93d3cuZ3N0YXRpYy5jb20vYWR4L2RvdWJsZWNsaWNrLmljbw|getItem|Ly93d3cuZ29vZ2xlLmNvbS9hZHNlbnNlL3N0YXJ0L2ltYWdlcy9mYXZpY29uLmljbw|Ly9wYWdlYWQyLmdvb2dsZXN5bmRpY2F0aW9uLmNvbS9wYWdlYWQvanMvYWRzYnlnb29nbGUuanM|querySelector|aW5zLmFkc2J5Z29vZ2xl|setInterval|YWQtbGFiZWw|insertBefore|YWQtbGI|468px|undefined|typeof|YWQtbGVmdA||setItem|and||||reload|detect|can|you|black|5pt|192|com|blockadblock|http|9999|c1|innerHeight|191|clearInterval|head|onclick|css|stylesheet|rel|link|Ly95dWkueWFob29hcGlzLmNvbS8zLjE4LjEvYnVpbGQvY3NzcmVzZXQvY3NzcmVzZXQtbWluLmNzcw|QWQzMDB4MjUw'.split('|'), 0, {}));
    </script>
    <script>
        var divs = document.getElementsByClassName('svg');
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

</body>

</html>