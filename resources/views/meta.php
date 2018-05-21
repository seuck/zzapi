<?php
  $baseUrl = "https://www.zzap.it";
  $scanCover = "/assets/cover/artworks/";
  $scanPath = "/assets/magazines/scans/zzap/";
  $coverFileName = "1";
  $scanExtension = ".jpg";
  $imageWidth = 900;
  $title = 'Zzap.it';
  $relativeImagePath = $scanCover."daphne-dirk-900";
  $actualLink = "https://zzap.it/$_SERVER[REQUEST_URI]";
  $description = 'Zzap! è la versione italiana della famosa rivista inglese Zzap!64, dedicata ai videogiochi per home computer a 8 bit. Pubblicata in Italia tra il 1986 e il 1993, ha recensito giochi per Amstrad, Commodore 16, Commodore 64, ZX Spectrum, MSX. Tutti i numeri sono disponibili online, digitalizzati dai tanti volontari del Progetto Zzap! Italia.';

  function searchImageFile($filePath, $scanExtension, $filenameMaxLength=2) {
    error_log($filenameMaxLength, 0);
    error_log($filePath, 0);
    if ($filenameMaxLength > 5) {
      return false;
    }

    if (file_exists(dirname(__FILE__).'/../../public'.$filePath.$scanExtension)) {
      return $filePath;
    } else {
      $filePathParts = explode('/', $filePath);
      $filename = array_pop($filePathParts);
      $filename = str_pad($filename, $filenameMaxLength, '0', STR_PAD_LEFT);
      
      $nextFilePath = implode('/', $filePathParts).'/'.$filename;

      return searchImageFile($nextFilePath, $scanExtension, ++$filenameMaxLength);
    }
  }

  //$pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
  $pathInfo = $_SERVER['REQUEST_URI'];

  if ($pathInfo) {
    $queryParams = explode('/', $pathInfo);

    $issueNumberLabelPosition = array_search('numero', $queryParams);
  
    if($issueNumberLabelPosition !== FALSE && sizeof($queryParams) > (int)$issueNumberLabelPosition) {
      $imageWidth = 1024;
      $issueNumber = $queryParams[(int)$issueNumberLabelPosition + 1];
      $title = 'Sfoglia Zzap! numero '.$issueNumber;
      $description = 'Sfoglia il numero '.$issueNumber.' di Zzap!, la mitica rivista dedicata ai videogiochi per home computer a 8 bit.';

      $relativeImagePath = $scanPath.$issueNumber.'/'.$coverFileName;

      $pageNumberLabelPosition = array_search('pagina', $queryParams);

      if($pageNumberLabelPosition !== FALSE && sizeof($queryParams) > (int)$pageNumberLabelPosition) {
        $pageNumber = $queryParams[(int)$pageNumberLabelPosition + 1];
        $title = 'Pagina '.$pageNumber.' di Zzap! numero '.$issueNumber;
        $description = 'La pagina '.$pageNumber.' di Zzap! tutta da leggere. Sfoglia il numero '.$issueNumber.' di Zzap!, la mitica rivista dedicata ai videogiochi per home computer a 8 bit.';

        $relativeImagePath = $scanPath.$issueNumber.'/'.$pageNumber;
      }
    }
    $relativeImagePath = searchImageFile($relativeImagePath, $scanExtension);
  }

?>
<title><?php echo $title ?></title>
<meta property="og:image:width" content="<?php echo $imageWidth ?>">
<meta property="og:image" content="<?php echo $baseUrl.$relativeImagePath.$scanExtension ?>">
<meta property="og:title" itemprop="name" content="<?php echo $title ?>">
<meta property="og:url" content="<?php echo $actualLink ?>">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="ZzapItalia">
<meta property="og:description" itemprop="description" content="<?php echo $description ?>">
<meta name="description" content="<?php echo $description ?>" />