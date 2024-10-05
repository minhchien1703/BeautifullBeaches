<?php

use Dompdf\Dompdf;
use Dompdf\Options;

class DetailsController extends BaseController
{
    private $__detailsModel;
    private $__homeModel;

    function __construct($conn)
    {
        $this->__detailsModel = $this->initModel("DetailsModel", $conn);
        $this->__homeModel = $this->initModel("HomeModel", $conn);
    }

    public function index()
    {
        if (isset($_GET['id'])) {
            $beach_id = intval($_GET['id']);
            $zones = $this->__homeModel->getAllZones();
            $beach = $this->__detailsModel->getBeachDetail($beach_id);
            if(!$beach) {
                $this->view("errors/404");
                return;
            }
            $image = $this->__detailsModel->getBeachImages($beach_id, 'details_bg_img');
            $map = $this->__detailsModel->getBeachImages($beach_id, 'details_map_img');
            $slideimgs = $this->__detailsModel->getBeachImages($beach_id, 'details_slides_img');
            $middleimg = $this->__detailsModel->getBeachImages($beach_id, 'details_middle_img');
            $traits = $this->__detailsModel->getTraitsByIds($beach['id']);
            $infos = $this->__detailsModel->getMoreInfoByIds($beach['id']);
            $flights = $this->__detailsModel->getFlightsbyid($beach['id']);
            $weathers = $this->__detailsModel->getBeachWeather($beach['id']);
            $reviews = $this->__detailsModel->getAllReviews($beach_id);

            $totalReviews = 0;
            $averageRating = 0;
            $percent1Star = 0;
            $percent2Star = 0;
            $percent3Star = 0;
            $percent4Star = 0;
            $percent5Star = 0;
            if (!empty($reviews)) {
                $num1Star = 0;
                $num2Star = 0;
                $num3Star = 0;
                $num4Star = 0;
                $num5Star = 0;
                foreach ($reviews as $rating) {
                    if ($rating['rating'] === 1) {
                        $num1Star += 1;
                    } elseif ($rating['rating'] === 2) {
                        $num2Star += 1;
                    } elseif ($rating['rating'] === 3) {
                        $num3Star += 1;
                    } elseif ($rating['rating'] === 4) {
                        $num4Star += 1;
                    } elseif ($rating['rating'] === 5) {
                        $num5Star += 1;
                    }
                }
                $totalReviews = $num1Star + $num2Star + $num3Star + $num4Star + $num5Star;
                $totalPoints = (1 * $num1Star) + (2 * $num2Star) + (3 * $num3Star) + (4 * $num4Star) + (5 * $num5Star);
                $averageRating = $totalPoints / $totalReviews;
                $averageRating = round($averageRating, 1);
                $percent1Star = ($num1Star / $totalReviews) * 100;
                $percent2Star = ($num2Star / $totalReviews) * 100;
                $percent3Star = ($num3Star / $totalReviews) * 100;
                $percent4Star = ($num4Star / $totalReviews) * 100;
                $percent5Star = ($num5Star / $totalReviews) * 100;
                $percent1Star = round($percent1Star, 1);
                $percent2Star = round($percent2Star, 1);
                $percent3Star = round($percent3Star, 1);
                $percent4Star = round($percent4Star, 1);
                $percent5Star = round($percent5Star, 1);
            }
            $this->view("layout", [
                "content" => "details",
                "beach" => $beach,
                "zones" => $zones,
                "image" => $image,
                "map" => $map,
                "slideimgs" => $slideimgs,
                "middleimg" => $middleimg,
                "traits" => $traits,
                "infos" => $infos,
                "weathers" => $weathers,
                "reviews" => $reviews,
                "flights" => $flights,
                "beach_id" => $beach_id,
                "totalReviews" => $totalReviews,
                "averageRating" => $averageRating,
                "percent1Star" => $percent1Star,
                "percent2Star" => $percent2Star,
                "percent3Star" => $percent3Star,
                "percent4Star" => $percent4Star,
                "percent5Star" => $percent5Star
            ]);
        }
    }

    public function saveReviews($beach_id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $starValue = $_POST["starValue"];
            $name = empty($_POST["name"]) ? "Anonymous" : $_POST["name"];
            $comments = empty($_POST["comments"]) ? "" : $_POST["comments"];
            $this->__detailsModel->saveReviews($starValue, $beach_id, $name, $comments);
            header("location: http://localhost/beautifulbeaches/details/index?id=$beach_id");
        }
    }

    public function downloadPDF($id = null)
    {
        if ($id === null && isset($_GET['id'])) {
            $id = intval($_GET['id']);
        }
        $beach_id = intval($id);
        $beach = $this->__detailsModel->getBeachDetail($beach_id);
        $traits = $this->__detailsModel->getTraitsByIds($beach_id);
        $infos = $this->__detailsModel->getMoreInfoByIds($beach_id);
        $weathers = $this->__detailsModel->getBeachWeather($beach_id);
        $flights = $this->__detailsModel->getFlightsbyid($beach['id']);
        ob_start();
        include __DIR__ . '/../views/pdf_template.php';
        $html = ob_get_clean();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream(preg_replace('/\s+/', '_',$beach["name"].'_Details.pdf'), ['Attachment' => true]);
    }

}
?>