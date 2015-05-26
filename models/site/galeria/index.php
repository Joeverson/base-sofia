<?php
include "models/site/widgets/topo.php";
include "models/site/widgets/menu.php";
?>
    <!-- - - - - - - - - - - - - - - Container - - - - - - - - - - - - - - - - -->

    <section class="container sbr clearfix">
                <div class="page-header">		
			<h1 class="page-title">Galeria</h1>
		</div>
        
        <div id="galeria" style="margin-bottom: 100px">
	</div>
        
    </section>

    <!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->

<?php
include "models/site/widgets/rodape.php";
?>
<link   href="<?= $actions->sitePath() ?>/includes/pwi/js/jquery.fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <script src="<?= $actions->sitePath() ?>/includes/pwi/js/jquery.fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="<?= $actions->sitePath() ?>/includes/pwi/js/jquery.blockUI.js" type="text/javascript"></script>
    <link   href="<?= $actions->sitePath() ?>/includes/pwi/css/pwi.css" rel="stylesheet" type="text/css"/>
    <script src="<?= $actions->sitePath() ?>/includes/pwi/js/jquery.pwi-min.js" type="text/javascript"></script>
    <script type="text/javascript">

      $(document).ready(function ($) {
        var settings = {
        username: '103034953653618747360', //-- Must be explicitly set!!!
        album: "", //-- For loading a single album
        authKey: "", //-- for loading a single album that is private (use in 'album' mode only)
        albums: [], //-- use to load specific albums only: ["MyAlbum", "TheSecondAlbumName", "OtherAlbum"]
        keyword: "", 
        albumKeywords: [], //-- Only show albums containing one of these keywords in the description. Use [keywords: "kw1", "kw2"] within the description
        albumStartDateTime: "", //-- Albums on or after this date will be shown. Format: YYYY-MM-DDTHH:MM:SS or YYYY-MM-DD for date only
        albumEndDateTime: "", //-- Albums before or on this date will be shown
        albumCrop: true, //-- crop thumbs on albumpage to have all albums in square thumbs (see albumThumbSize for supported sizes)
        albumTitle: "", //-- overrule album title in 'album' mode
        albumThumbSize: 160, //-- specify thumbnail size of albumthumbs (default: 72, supported cropped/uncropped: 32, 48, 64, 72, 104, 144, 150, 160 and uncropped only: 94, 110, 128, 200, 220, 288, 320, 400, 512, 576, 640, 720, 800, 912, 1024, 1152, 1280, 1440, 1600)
        albumThumbAlign: true, //-- Allign thumbs vertically between rows
        albumMaxResults: 999, //-- load only the first X albums
        albumsPerPage: 12, //-- show X albums per page (activates paging on albums when this amount is less then the available albums)
        albumPage: 1, //-- force load on specific album
        albumTypes: "public", //-- load public albums, not used for now
        page: 1, //-- initial page for an photo page
        photoSize: "auto", //-- size of large photo loaded in slimbox, fancybox or other. Allowed sizes: auto, 94, 110, 128, 200, 220, 288, 320, 400, 512, 576, 640, 720, 800, 912, 1024, 1152, 1280, 1440, 1600
        maxResults: 30, //-- photos per page
        showPager: 'bottom', //'top', 'bottom', 'both' (for both albums and album paging)
        thumbSize: 160,  //-- specify thumbnail size of photos (default: 72, cropped not supported, supported cropped/uncropped: 32, 48, 64, 72, 104, 144, 150, 160 and uncropped only: 94, 110, 128, 200, 220, 288, 320, 400, 512, 576, 640, 720, 800, 912, 1024, 1152, 1280, 1440, 1600)
        thumbCrop: false, //-- force crop on photo thumbnails (see thumbSize for supported sized)
        thumbAlign: false, //-- Allign thumbs vertically between rows
        thumbCss: {
            'margin': '20px'
        },
        onclickThumb: "",       //-- overload the function when clicked on a photo thumbnail
        onclickAlbumThumb: "",  //-- overload the function when clicked on a album thumbnail
        sortAlbums: "none",     // Can be none, ASC_DATE, DESC_DATE, ASC_NAME, DESC_NAME
        sortPhotos: "none",     // Can be none, ASC_DATE, DESC_DATE, ASC_NAME, DESC_NAME
        removeAlbums: [],       //-- Albums with this type in the gphoto$albumType will not be shown. Known types are Blogger, ScrapBook, ProfilePhotos, Buzz, CameraSync
        removeAlbumTypes: [],   //-- Albums with this type in the gphoto$albumType will not be shown. Known types are Blogger, ScrapBook, ProfilePhotos, Buzz, CameraSync
        showAlbumTitles: false,  //--following settings should be self-explanatory
        showAlbumTitlesLength: 9999,
        showAlbumThumbs: true,
        showAlbumdate: false,
        showAlbumPhotoCount: false,
        showAlbumDescription: false,
        showAlbumLocation: false,
        showPhotoCaption: true,
        showPhotoCaptionDate: false,
        showCaptionLength: 9999,
        showPhotoDownload: false,
        showPhotoDownloadPopup: false,
        showPhotoDate: false,
        showPermaLink: false,
        showPhotoLocation: false,
        mapIconLocation: "",
        mapSize: 0.75,      // 75% of the window
        useQueryParameters: true,
        loadingImage: "",
        videoBorder: "images/video.jpg",
        };
        $("#galeria").pwi(settings);
      });

    </script>