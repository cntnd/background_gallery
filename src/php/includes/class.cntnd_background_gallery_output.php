<?php

namespace Cntnd\BackgroundGallery;

include_once("class.cntnd_util.php");

/**
 * cntnd_background_gallery Output Class
 */
class CntndBackgroundGalleryOutput extends CntndUtil
{

    private $idart;
    private $lang;
    private $client;
    private $folder;
    private $sort;
    private $delay;

    private $db;
    private $images = array();
    private $imagetypes = array('jpeg', 'jpg', 'gif', 'png');
    private $uploadDir;
    private $uploadPath;

    function __construct($idart, $lang, $client, $folder, $sort, $delay)
    {
        $this->idart = $idart;
        $this->lang = $lang;
        $this->client = $client;
        $this->folder = $folder;
        $this->sort = $sort;
        $this->delay = $delay;

        $this->db = new \cDb;

        $cfgClient = \cRegistry::getClientConfig();
        $this->uploadDir = $cfgClient[$client]["upl"]["htmlpath"];
        $this->uploadPath = $cfgClient[$client]["upl"]["path"];
    }

    public function images()
    {
        return $this->images;
    }

    public function load()
    {
        // images
        $cfg = \cRegistry::getConfig();

        $sql = "SELECT * FROM :table WHERE idclient=:idclient AND dirname=':dirname' ORDER BY filename :sort";
        $values = array(
            'table' => $cfg['tab']['upl'],
            'idclient' => \cSecurity::toInteger($this->client),
            'dirname' => \cSecurity::toString($this->folder),
            'sort' => \cSecurity::toString($this->sort)
        );
        $this->db->query($sql, $values);
        while ($this->db->nextRecord()) {
            // Bilder
            if (in_array($this->db->f('filetype'), $this->imagetypes)) {
                $image = $this->uploadDir . $this->db->f('dirname') . $this->db->f('filename');
                $this->images[$this->db->f('idupl')] = $image;
            }
        }
    }

    public function delay()
    {
        return $this->delay * 1000;
    }
}

?>
