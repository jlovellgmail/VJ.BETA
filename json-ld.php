
<?php
// JSON-LD for SEO Structured Data 

$payload["@context"] = "http://schema.org/";

if ($seo_variable == "home") {
  $payload["@type"] = "Organization";
  $payload["name"] = "Virgil James";
  $payload["address"] = array (

    "@type" => "PostalAddress",
    "addressLocality" => "Solana Beach",
    "addressRegion" => "CA",
    "postalCode" => "92075",
    "streetAddress" => "214 N. Cedros Avenue"
  );
  
  $payload["logo"] = "http://www.virgiljames.com/img/vj-logo.png";
  $payload["url"] = "http://www.virgiljames.com";
  $payload["sameAs"] = array(
				"https://www.facebook.com/virgiljamesdesign",
				"https://twitter.com/virgiljames_",
				"https://www.pinterest.com/virgiljamesbags/",
				"https://instagram.com/virgiljamesdesign/"
  );
  $payload["contactPoint"] = array(
    array(
      "@type" => "ContactPoint",
      "telephone" => "+1-323-336-4122",
      "email" => "support@virgiljames.com",
      "contactType" => "customer service"
    )
  );
}

if ($seo_variable == "product") {

  $twitterHandleURL = $twitterShortUrl;

  $facebookHandle = $facebookUrl;

  $pinterestHandle = $pinterest;

  $payload["@type"] = "Product";
  $payload["name"] = $Product->getVar("ShortDescription");
  $payload["image"] = $ImgUrl;
  $payload["description"] =	$Product->getVar('Description');
  $payload["mpn"] = $PID;
  $payload["brand"] =  array(
	array (
			"@type" => "Thing",
			"name" => "VirgilJames"
		)
	);
  $payload["sameAs"] =  array(
    $twitterHandleURL, $websiteHandle, $facebookHandle, $pinterestHandle

      );
  
}

if ($seo_variable == "shop") {

	$ProdImgUrlP = $Product->getThumbnailUrl();
	$ProdPriceP = number_format((float) $Product->getVar("Price"), 0, '.', ',');
	$ProdTitleP = $Product->getProductName();
	$TitleP = $Product->getName();
	$StyleP = str_replace(" ", "-", $ProdTitleP);
	$PImgUrl = "http://virgiljames.com$ProdImgUrlP";
	$PDescription = $Product->getVar("ShortDescription");
	$PName = $TitleP;
	$PPID = $Product->getVar("PID");
	$producturl = "http://virgiljames.com/product/$StyleP/$PPID";

  $payload["@type"] = "Product";
  $payload["name"] = $PName;
  $payload["image"] = $PImgUrl;
  $payload["description"] =	$PDescription;
  $payload["mpn"] = $PPID;
  $payload["brand"] =  array(
	array (
			"@type" => "Thing",
			"name" => "VirgilJames"
		)
	);
	
	$payload["offers"] = array (
	"@type" => "Offer",
	"url" => $producturl,
	"priceCurrency" => "USD",
	"price" => $ProdPriceP

	);
}

if ($seo_variable == "ambassador") {
	
	$FName = $ambassador->getFName();
	$LName = $ambassador->getLName();
	$ALocation = array (
    "@type" => "PostalAddress",
    "addressLocality" => "Solana Beach",
    "addressRegion" => "CA",
    "postalCode" => "92075",
    "streetAddress" => "214 N. Cedros Avenue"
  );
	$ambassador_name = $FName . " " . $LName ;
	$same_as =  array(
			$twitterUrlSEO, $facebookUrlSEO
	  );
	$ambassador_url = "http://www.virgiljames.com/ambassador/" . $PermLink . "/profile/";
		if (is_array($events)) {
				$row = $events[0];
				$event = new AmbassadorEvent();
				$event->initialize($row);
				$eventDate = new DateTime($event->getVar("Date") . " " . $event->getVar("Time"));
				$date = $eventDate->format("c");
				$unformatedate = strtotime($EventDate);
				//$date = date("c",$unformatedate) ;
				$payload["@type"] = "SaleEvent";
				$payload["url"] = $ambassador_url;
				$payload["name"] = $event->getVar("Name");
				$payload["startDate"] = $date;
				$payload["description"] = $event->getVar("Description");
				$payload["location"] = array (
				"@type" => "Place",
				"name" => $event->getVar("Name"),
				"address" => $event->getVar("Location")
				);

			$eventName = strtolower($event->getVar("Name"));
		}
	$payload["organizer"] = array (
		"@type" => "Person",
		"name" => $ambassador_name ,
		"sameAs" => $ambassador_url
	);
	$payload["startDate"] = $date;
	
}

if ($seo_variable == "ambassadors") {
	
	$ALocation = array (
    "@type" => "PostalAddress",
    "addressLocality" => "Solana Beach",
    "addressRegion" => "CA",
    "postalCode" => "92075",
    "streetAddress" => "214 N. Cedros Avenue"
  );
	$FName = $ambassador->getFName();
	$LName = $ambassador->getLName();
	$ambassador_name = $FName . " " . $LName ;
	$unformatedate = strtotime($EventDate);
	$date = date("c",$unformatedate) ;
	$same_as =  array(
			$twitterUrlSEO, $facebookUrlSEO
	  );
	$ambassador_url = "http://www.virgiljames.com/ambassador/" . $PermLink . "/profile/";
	$payload["@type"] = "SaleEvent";
	$payload["url"] = $eventUrlSEO;
	$payload["name"] = $Name;
	$payload["description"] = $Description;
	$payload["location"] = array (
	"@type" => "Place",
	"name" => $Name,
	"address" => $ALocation
	);
	$payload["organizer"] = array (
		"@type" => "Person",
		"name" => $ambassador_name ,
		"sameAs" => $ambassador_url
	);
	$payload["startDate"] = $date;

}

if ($seo_variable == "post") {
	   $payload["@type"] = "BlogPosting";
	   $payload["mainEntityOfPage"] = array (
			"@type" => "WebPage",
			"@id" => $PostUrlSEO
	  
	  );
	  
		$payload["headline"] = $Title;
		$payload["image"] = array (
			"@type" => "ImageObject",
			"url" => $PostUrlImgSEO ,
			"height" => 475,
			"width" => 1440
	  
	  );
	  $Pdate = $dateObj->format("c");
	  
	  if ($from == "lifestyle") {
		  $author = "Virgil James";
	  } else if ($from == "ambassador") {
		  $author = $PermLink;
	  }
	  
	  $payload["datePublished"] = $Pdate;
	  $payload["dateModified"] = $Pdate;
		   $payload["author"] = array (
			"@type" => "Person",
			"name" => $author
	  
	  );

	  
	  
	    $payload["publisher"] =  array(
		
			"@type" => "Organization",
			"name" => "Virgil James",
			"logo" =>	array (
		"@type" => "ImageObject",
		"url" => "http://www.virgiljames.com/img/vj-logo.png",
		"width" => 213,
		"height" => 36
			)
		);
	  
	  $payload["description"] = $SubTitle;

}


if ($seo_variable == "lifestyle") {
		
		$Location = array (
		"@type" => "PostalAddress",
		"addressLocality" => "Solana Beach",
		"addressRegion" => "CA",
		"postalCode" => "92075",
		"streetAddress" => "214 N. Cedros Avenue"
		);

		$eventDate = new DateTime($Levent->getVar("Date") . " " . $Levent->getVar("Time"));
		$date = $eventDate->format("c");
		
		$payload["@type"] = "SaleEvent";
		$payload["url"] = "http://www.virgiljames.com/lifestyle/";
		$payload["name"] = $Levent->getVar("Name");
		$payload["startDate"] = $date;
		$payload["description"] = $Levent->getVar("Description");
		$payload["location"] = array (
		"@type" => "Place",
		"name" => $Levent->getVar("Name"),
		"address" => $Location
		);

		$payload["organizer"] = array (
			"@type" => "Organization",
			"name" => "Virgil James" ,
			"sameAs" =>  array(
					"https://www.facebook.com/virgiljamesdesign",
					"https://twitter.com/virgiljames_",
					"https://www.pinterest.com/virgiljamesbags/",
					"https://instagram.com/virgiljamesdesign/"
			)
		);
		$payload["startDate"] = $date;
	
	
	}


?>

