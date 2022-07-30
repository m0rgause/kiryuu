<?php
include_once "dom.php";
class Kiryuu
{
    protected $apiUrl = 'https://kiryuu.id';

    public function home()
    {
        $html = file_get_html("{$this->apiUrl}/");
        $src = "data-lazy-src";
        // Populer
        $populars = [];
        $getPopulars = $html->find('div.listupd > div.bs');
        foreach ($getPopulars as $getPopular) {
            $dataPopular['title'] = $getPopular->find('div.bsx > a', 0)->title;
            $dataPopular['link'] = $this->_replace($getPopular->find('div.bsx > a', 0)->href);
            $dataPopular['type'] = str_replace('type ', '', $getPopular->find('div.bsx > a', 0)->find('span', 0)->class);
            $features = $getPopular->find('div.bsx > a', 0)->find('span');
            // $dataPopular['features'] = [];
            foreach ($features as $k => $f) {
                if ($k > 0)
                    if ($f->class != false)
                        // array_push($dataPopular['features'], $f->class);
                        $popularfeature = $f->class;
            }
            $dataPopular['features'] = $popularfeature;
            $dppimage = $getPopular->find('div.bsx > a', 0)->find('img', 0);
            $dataPopular['image'] = isset($dppimage->$src) ? str_replace('?resize=165,225', '', $dppimage->$src) : str_replace('?resize=165,225', '', $dppimage->src);
            $dataPopular['last_chapter'] = $getPopular->find('div.epxs', 0)->innertext;
            $dataPopular['rating'] = $getPopular->find('div.numscore', 0)->innertext;
            array_push($populars, $dataPopular);
        }
        // Project 
        $projects = [];
        $getProjects = $html->find('div.listupd', 1)->find('div.utao');

        foreach ($getProjects as $getProject) {
            $dataProject['title'] = $getProject->find('div.imgu > a', 0)->title;
            $dataProject['link'] = $this->_replace($getProject->find('div.imgu > a', 0)->href);
            $dataProject['type'] = $getProject->find('div.luf > ul', 0)->class;
            $features = $getProject->find('div.imgu > a', 0)->find('span');

            foreach ($features as $k => $f) {
                // array_push($dataProject['features'], $f->class);
                $projectfeature = $f->class;
            }
            $dataProject['features'] = $projectfeature;
            $dprimage = $getProject->find('div.imgu > a > img', 0);
            $dataProject['image'] = isset($dprimage->$src) ? str_replace('?resize=100,130', '', $dprimage->$src) : str_replace('?resize=100,130', '', $dprimage->src);
            $lastUpdate = $getProject->find('div.luf > ul > li');
            $dataProject['last_update'] = [];
            foreach ($lastUpdate as $l) {
                $last['link'] = $this->_replace($l->find('a', 0)->href);
                $last['chapter'] = $l->find('a', 0)->innertext;
                $last['updated_at'] = $l->find('span', 0)->innertext;
                array_push($dataProject['last_update'], $last);
            }
            array_push($projects, $dataProject);
        }
        $newRelease = [];

        $getRelease = $html->find('div.listupd', 2)->find('div.utao');
        foreach ($getRelease as $release) {
            $dataRelease['title'] = $release->find('div.imgu > a', 0)->title;
            $dataRelease['link'] = empty($release->find('div.imgu > a', 0)->href) ? "" : $this->_replace($release->find('div.imgu > a', 0)->href);
            $dataRelease['type'] = empty($release->find('div.luf > ul', 0)->class) ? "" : $release->find('div.luf > ul', 0)->class;
            $features = $release->find('div.imgu > a', 0)->find('span');
            $releasefeature = '';
            foreach ($features as $k => $f) {
                // array_push($dataRelease['features'], $f->class);
                $releasefeature = empty($f->class) ? "" : $f->class;
            }
            $dataRelease['features'] = $releasefeature;
            $drimage = $release->find('div.imgu > a > img', 0);
            $dataRelease['image'] = isset($drimage->$src) ? str_replace('?resize=100,130', '', $drimage->$src) : str_replace('?resize=100,130', '', $drimage->src);
            $lastUpdate = $release->find('div.luf > ul > li');
            $dataRelease['last_update'] = [];
            if (!empty($lastUpdate)) {
                foreach ($lastUpdate as $l) {
                    $last['link'] =  empty($l->find('a', 0)->href) ? "" : $this->_replace($l->find('a', 0)->href);
                    $last['chapter'] = empty($l->find('a', 0)->innertext) ? "" : $l->find('a', 0)->innertext;
                    $last['updated_at'] = $l->find('span', 0)->innertext;
                    array_push($dataRelease['last_update'], $last);
                }
            }

            array_push($newRelease, $dataRelease);
        }

        // return [$populars, $projects];
        return array(
            "populars" => $populars,
            "projects" => $projects,
            "new_release" => $newRelease
        );
    }

    public function comicType(String $type, Int $page = 1)
    {
        $html = file_get_html("{$this->apiUrl}/manga/?page={$page}&type={$type}&order=popular");
        $html = $html->find('div.listupd > div.bs');
        $output = array();
        foreach ($html as $res) {
            $data['title'] = $res->find('div.bsx > a', 0)->title;
            $data['link'] = $this->_replace($res->find('div.bsx > a', 0)->href);
            $data['type'] = str_replace('type ', '', $res->find('div.bsx > a', 0)->find('span', 0)->class);
            $features = $res->find('div.bsx > a', 0)->find('span');
            $data['features'] = [];
            foreach ($features as $k => $f) {
                if ($k > 0)
                    if ($f->class != false)
                        array_push($data['features'], $f->class);
            }
            $src = "data-lazy-src";
            $img = $res->find('div.bsx > a', 0)->find('img', 0);
            $data['image'] = isset($img->$src) ? str_replace('?resize=165,225', '', $img->$src) : str_replace('?resize=165,225', '', $img->src);
            $data['last_chapter'] = $res->find('div.epxs', 0)->innertext;
            $data['rating'] = $res->find('div.numscore', 0)->innertext;
            array_push($output, $data);
        }
        return $output;
    }
    public function search($query, $page = 1)
    {
        $html = file_get_html("{$this->apiUrl}/page/{$page}/?s={$query}");
        $html = $html->find('div.listupd > div.bs');
        $output = [];
        foreach ($html as $res) {
            $data['title'] = $res->find('div.bsx > a', 0)->title;
            $data['link'] = $this->_replace($res->find('div.bsx > a', 0)->href);
            $data['type'] = str_replace('type ', '', $res->find('div.bsx > a', 0)->find('span', 0)->class);
            $features = $res->find('div.bsx > a', 0)->find('span');
            $data['features'] = [];
            foreach ($features as $k => $f) {
                if ($k > 0)
                    if ($f->class != false)
                        array_push($data['features'], $f->class);
            }
            $src = "data-original-src";
            $dimg = $res->find('div.bsx > a', 0)->find('img', 0);
            $data['image'] = isset($dimg->$src) ? str_replace('?resize=165,225', '', $dimg->$src) : str_replace('?resize=165,225', '', $dimg->src);
            $data['last_chapter'] = $res->find('div.epxs', 0)->innertext;
            $data['rating'] = $res->find('div.numscore', 0)->innertext;
            array_push($output, $data);
        }
        return $output;
    }

    public function mangaDetail(String $comic)
    {
        $html = file_get_html("{$this->apiUrl}/manga/{$comic}");
        $src = "data-lazy-src";
        $data['title'] = $html->find('div.seriestucon > div.seriestuheader > h1', 0)->innertext;
        $dimage = $html->find('div.seriestucon > div.seriestucontent', 0)->find('img', 0);
        $data['image'] = isset($dimage->$src) ? $dimage->$src : $dimage->src;
        $data['description'] = $html->find('div.seriestucon > div.seriestucontent > div.seriestucontentr', 0)->find('p', 0)->innertext;
        $infoTable = $html->find('div.seriestucon', 0)->find('table.infotable > tbody > tr');
        foreach ($infoTable as $info) {
            if (str_contains(strtolower($info->find('td', 0)->innertext), 'status'))
                $table['status'] = $info->find('td', 1)->innertext;
            if (str_contains(strtolower($info->find('td', 0)->innertext), 'type'))
                $table['type'] = $info->find('td', 1)->innertext;
            if (str_contains(strtolower($info->find('td', 0)->innertext), 'released'))
                $table['released'] = $info->find('td', 1)->innertext;
            if (str_contains(strtolower($info->find('td', 0)->innertext), 'author'))
                $table['author'] = $info->find('td', 1)->innertext;
            if (str_contains(strtolower($info->find('td', 0)->innertext), 'artist'))
                $table['artist'] = $info->find('td', 1)->innertext;
            if (str_contains(strtolower($info->find('td', 0)->innertext), 'updated'))
                $table['updated_at'] = $info->find('td', 1)->find('time', 0)->innertext;
        }
        $data['info'] = $table;

        $genres = $html->find('div.seriestugenre', 0)->find('a');
        $data['genres'] = [];
        foreach ($genres as $genre) {
            $g['link'] = $this->_replace($genre->href);
            $g['name'] = $genre->innertext;
            array_push($data['genres'], $g);
        }


        $chapters = $html->find('div#chapterlist > ul', 0)->find('li');
        $data['chapters'] = [];
        foreach ($chapters as $chapter) {
            $num = "data-num";
            $ch['chapter'] = $chapter->$num;
            $ch['link'] = $this->_replace($chapter->find('div.eph-num > a', 0)->href);
            $ch['released'] = $chapter->find('div.eph-num > a > span.chapterdate', 0)->innertext;


            array_push($data['chapters'], $ch);
        }

        $data['first_chapter'] = ["chapter" => $data['chapters'][count($chapters) - 1]['chapter'], "link" => $data['chapters'][count($chapters) - 1]['link']];
        $data['last_chapter'] = ["chapter" => $data['chapters'][0]['chapter'], "link" => $data['chapters'][0]['link']];

        // 
        // Related
        // 

        $rhtml = $html->find('div.listupd', 0)->find('div.bs');
        $related = array();
        foreach ($rhtml as $res) {
            $dataRelated['title'] = $res->find('div.bsx > a', 0)->title;
            $dataRelated['link'] = $this->_replace($res->find('div.bsx > a', 0)->href);
            $dataRelated['type'] = str_replace('type ', '', $res->find('div.bsx > a', 0)->find('span', 0)->class);
            $features = $res->find('div.bsx > a', 0)->find('span');
            $dataRelated['features'] = [];
            foreach ($features as $k => $f) {
                if ($k > 0)
                    if ($f->class != false)
                        array_push($dataRelated['features'], $f->class);
            }
            $src = "data-original-src";
            $dataRelated['image'] = str_replace('?resize=165,225', '', $res->find('div.bsx > a', 0)->find('img', 0)->$src);
            $dataRelated['last_chapter'] = $res->find('div.epxs', 0)->innertext;
            $dataRelated['rating'] = $res->find('div.numscore', 0)->innertext;
            array_push($related, $dataRelated);
        }


        return ["result" => $data, "related" => $related];
    }

    public function mangaReader($link)
    {
        $html = file_get_html("{$this->apiUrl}/{$link}");
        $comic = $html->find('div.allc > a', 0)->href;
        $getCover = file_get_html($comic);
        $src = "data-lazy-src";
        $dimage = $getCover->find('div.seriestucon > div.seriestucontent', 0)->find('img', 0);
        $data['poster'] = isset($dimage->$src) ? $dimage->$src : $dimage->src;

        $data['title'] = $html->find('h1.entry-title', 0)->innertext;
        $scripts = $html->find('script');
        foreach ($scripts as $s) {
            if (strpos($s->innertext, 'ts_reader.run') !== false) {
                $getNextPrev = $s;
            }
            if (strpos($s->innertext, 'var post_id') !== false) {
                $postid = $s;
            }
        }

        preg_match('/ts_reader.run[(]\s*([^);]+)/', $getNextPrev, $nextprev);
        preg_match_all("/var chapter_id = ([^;]+)/", $postid, $post_id);
        preg_match('/Chapter ([^ ]+)/', $html->find("div.chaptertags", 0)->innertext, $ch);

        $tempik = json_decode($nextprev[1], 1);
        $data['post_id'] = $post_id[1][0];

        $data['chapter'] = $ch[1];

        $data['images'] = $tempik['sources'][0]['images'];
        $data['next_chapter'] = $this->_replace($tempik['nextUrl']);
        $data['prev_chapter'] = $this->_replace($tempik['prevUrl']);

        return $data;
    }

    private function _replace($str)
    {
        return str_replace($this->apiUrl, '', $str);
    }
}

// header('Content-type: application/json');
$p = new Kiryuu;
// // print_r($p->home());
# echo json_encode($p->mangaReader('/koi-ka-mahou-ka-wakaranai-chapter-13/'));
// echo '<img src="' . $p->home()[0]["image"] . '">';
