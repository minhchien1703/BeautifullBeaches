<?php
class SitemapController extends BaseController {
    private $__sitemapModel;
    function __construct($conn) {
        $this->__sitemapModel = $this->initModel("SitemapModel", $conn);
    }
    
    public function index() {
        $zones = $this->__sitemapModel->getAllZones();
        $beaches = $this->__sitemapModel->getAllBeaches();
        $this->view("layout2", [
            "content" => "sitemap",
            "beaches" => $beaches,
            "zones" => $zones]);

    }


}
?>
