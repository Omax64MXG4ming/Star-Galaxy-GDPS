<?php

	include("_init_.php");

?>
 
<head>
	<?php include("customEmbed.php"); ?>
	<meta charset="utf-8">
	<link href="assets/css/browser.css?v=6" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
	<link rel="manifest" href="manifest.json">

	<?php
		
		include("./assets/htmlext/flayeralert.php");
		include("./assets/htmlext/loadingalert.php");

    ?>

</head>
<style>
	.gdButtonBrowser {
		cursor: pointer;
	}

	.ad2hs-prompt {

        display: none;
		position: absolute;
		margin: 0 1rem 1rem;
		width: max-content;
		z-index: 9999;
		font-family: Pusab;
		padding: 1vh;
		font-size: clamp(0.5px, 2.2vw, 10vh);
		-webkit-text-stroke: clamp(0.5px, 0.09vw, 1.8px) black;
		text-align: center;
		bottom: -5%;
		left: 50%;
		transform: translate(-50%, -50%) scale(1.05);
		transition: unset;
    }

	.ad2hs-prompt:hover {
		transform: translate(-50%, -50%) scale(1.05);
	}

	.notfinishedBtn {
		filter: grayscale(1);
		cursor:not-allowed;
		pointer-events: none;
	}

</style>

<body class="levelBG" onbeforeunload="saveUrl()">

<div id="everything">

	<button type="button" class="ad2hs-prompt gdsButton center"><img src="assets/gdps/launchericon-48-48.png"> Install Web App for better experience!</button>

	<div class="popup" id="credits">
	</div>

	<div style="position:absolute; bottom: 0%; left: 0%; width: 100%; pointer-events: none">
		<img class="cornerPiece" src="assets/corner.png" width=7%;>
	</div>

	<div style="position:absolute; top: 0%; left: 0%; width: 100%; pointer-events: none">
		<img class="cornerPiece" src="assets/corner.png" width=7%; style="transform: scaleY(-1)">
	</div>

	<div style="position:absolute; top: 1.7%; right: 2%; text-align: right; width: 10%;">
		<img id="creditsButton" class="gdButtonBrowser" src="assets/credits.png" width="60%" onclick="showCredits()">
	</div>

	

	<div style="position: absolute;
    bottom: 10.5%;
    display: flex;
	left: 0%;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    align-content: center;
    flex-direction: column;
	width: 15%;">
	<h1 class="smaller noSelect" style="font-size: 3vh; -webkit-text-stroke-width: 0.15vh;text-wrap: auto;text-align: center;">
		<?php if(!$logged) echo 'Inicia Sesion Aqui!'; else echo $userName; ?>
	</h1>
		<a onclick="openProfle()" style="width:30%;"><img class="gdButtonBrowser" src="assets/user.png" width = "100%"></a>
	</div>

	<?php if($logged && $isAdmin) { ?> 
		<div style="position:absolute; bottom: 2%; right: 1%; text-align: right; width: 15%; display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: center;">
			<h1 class="smaller noSelect" style="font-size: 3vh; -webkit-text-stroke-width: 0.15vh;text-wrap: auto;text-align: center;" id="updateText">
			<!-- <p style="text-align: center;" id="updateText">OGDW Updater</p> -->OGDBWS Updater
			</h1>
			<img class="gdButtonBrowser" id="updateButtonImg" src="assets/replay.png" width="40%" onclick="updateCoreWebButton()"></a>
		</div>; 

		<div style="position:absolute; bottom: 30%; right: 1%; text-align: right; width: 15%; display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: center;">
			<h1 class="smaller noSelect" style="font-size: 3vh; -webkit-text-stroke-width: 0.15vh;text-wrap: auto;text-align: center;">BWS Settings</h1>
			<img class="gdButtonBrowser" src="assets/edit.png" width="40%" onclick="openGDPSSettings()"></a>
		</div>; 
		<?php
	} ?>
	

	<div class="popup" id="alertMismathAssets" style="z-index: 9999; pointer-events: all; background-color: transparent; top: -34vh; pointer-events: none;">
		<div class="transparentbox bounce center supercenter" style="width: 85vh; height: auto; background-color: #000000c9;">
			<h3 class="smaller center" style="font-size: 5.5vh; margin-top: 1%; display: block; color: red;"><img src="./assets/x.png" style="width: 5vh; margin-right: 1.5vh;">Version mismatch</h3>
				<input type="text" name="act" value="delete" hidden>
				<h3 class="bigger center" style="line-height: 5vh; margin-top: 1.5vh; text-wrap: wrap;">
					Clear your cache browser and restart or wait a while until this alert disappears.
				</h3>

				<div onclick="viewAdvMismatchAlert('alertMismathAssets')" class="closeWindow gdsButton" style="margin-left: 6vh; padding-left:1.5vh;padding-right:1.5vh;margin-right: 6vh;height: 6vh; padding-top: 0.5vh; user-select: none; pointer-events: all; z-index: 9999; cursor: pointer;" tabindex="0"><h3 class="gdfont-Pusab" style="align-items: center;">View more information</h3></div>

		</div>
		
	</div>

	<div class="popup" id="installOGDWApp" style="z-index: 9999;">
		<div class="purplebox bounce center supercenter" style="width: 83vh; height: auto;">
			<h3 class="smaller center" style="font-size: 5.5vh; margin-top: 1%; display: block; color: #76da28;"><img src="./assets/download.png" style="width: 5vh; margin-right: 1.5vh;">Install Web App</h3>
				<input type="text" name="act" value="delete" hidden>
				<h3 class="bigger center" style="line-height: 5vh; margin-top: 1.5vh; text-wrap: wrap;">
					<cy>Install the web app</cy> on your mobile phone for a <cg>better experience</cg>, <cb>it doesn't take up space on your device</cb> and <cg>it's free!</cg>
				</h3>
				<div style="display: flex; justify-content: center; flex-wrap: wrap;">
				<div class="gdsButton" onclick="installPWABrowser('installOGDWApp')" style="padding-left:1.5vh;padding-right:1.5vh;margin-right: 3vh; padding-top: 0.8vh; display: flex; justify-content: center;"><h3 class="gdfont-Pusab" style="font-size: 3.5vh;" id="textContentFileSelect">Install now!</h3></div>
				<div class="closeWindow gdsButton red" onclick="closeWindow('installOGDWApp')" style="padding-left:1.5vh;padding-right:1.5vh;margin-right: 3vh;padding-top: 0.8vh;"><h3 class="gdfont-Pusab" style="align-items: center; font-size: 3.5vh;" id="textContentFileSelect">No, thanks!</h3></div>
				<div class="closeWindow gdsButton red" onclick="hidePWAInstaller('installOGDWApp')" style="padding-left:1.5vh;padding-right:1.5vh;margin-right: 3vh;padding-top: 0.8vh;"><h3 class="gdfont-Pusab" style="align-items: center; font-size: 3.5vh;" id="textContentFileSelect">Do not show this alert again</h3></div>
				</div>

		</div>
		
	</div>

	<!-- <div class="menu-achievements" style="position:absolute; top: 5.5%; left: 3%; width: 12%;">
		<a href="../achievements"><img class="gdButton" src="assets/achievements.png" width="40%"></a>
	</div>

	<div class="menu-messages" style="position:absolute; top: -1.7%; left: 11%; text-align: left; width: 10%;">
		<a href="../messages"><img class="iconRope" src="assets/messagerope.png" width="40%"></a>
	</div>  

	<div style="position:absolute; top: -1.5%; right: 10%; text-align: right; width: 10%;">
		<a href="./iconkit"><img class="iconRope" src="assets/iconrope.png" width="40%"></a>
	</div> -->

	<div class="dashboardIcon" style="position:absolute; top: 10%; left: 1%; text-align: left; width: 10%;"> <a href="/dashboard/"><img class="dashboardIcon" src="dashboard.png" width="70%"></a> </div> 

<div class="discordIcon" style="position:absolute; top: 35.5%; left: 1%; text-align: left; width: 10%;"> <a href="https://discord.gg/7S3fwnuWeE"><img class="discordIcon" src="discord.png" width="70%"></a> </div>

	<div class="supercenter center" id="menuButtons">
			<table>
					<tr class="menuButtonList">
						<!-- <td><a tabindex="1" href="./search/*?type=saved"><img class="menubutton menu-saved" src="assets/category-saved.png" title="Saved Levels"></a></td> -->


						
						<td id="gdItem21"><a tabindex="1" onclick="openSpecialLvl('!daily')"><img class="menubutton menu-daily" src="assets/category-daily.png" title="Daily Level"></a></td>
						<td id="gdItem21"><a tabindex="1" onclick="openSpecialLvl('!weekly')"><img class="menubutton menu-weekly" src="assets/category-weekly.png" title="Weekly Demon"></a></td>
						<td id="gdItem22"><a tabindex="1" onclick="openSpecialLvl('!event')"><img class="menubutton menu-event" src="assets/category-event.png" title="Event level"></a></td>
						
						<td id="gdItem19"><a tabindex="1" onclick="urlRedirect('./songs/?')"><img class="menubutton menu-songs" src="assets/category-songs.png" title="Songs"></a></td>

						
						<td class="notfinishedBtn" id="gdItem11"><a tabindex="1" onclick="urlRedirect('./leaderboard')"><img class="menubutton menu-leaderboard" src="assets/category-scores.png" title="Scores"></a></td>
						
					</tr>
					<tr class="menuButtonList">

						<td style="display: block" id="menu_featured"><a tabindex="1" onclick="searchRedirect('0','featured')"><img class="menubutton menu-featured" src="assets/category-featured.png" title="Featured"></a></td>
						
						<td id="gdItem21-gdItem21"><a tabindex="1" onclick="searchRedirect('0','hof')"><img class="menubutton menu-hof" src="assets/category-hof.png" title="Hall Of Fame"></a></td>

						<td id="gdItem21"><a tabindex="1" onclick="urlRedirect('./gauntlets')"><img class="menubutton menu-gauntlets" src="assets/category-gauntlets.png" title="Gauntlets"></a></td>
						
						<!-- <img src="./assets/exclamation.png" style="position: absolute; height: 18%; left: 3.5%; bottom: 23%; pointer-events: none; z-index: 50;"> -->
						
						<td class="notfinishedBtn" id="gdItem22"><a tabindex="1" onclick="urlRedirect('./lists')"><img class="menubutton menu-request" src="assets/category-lists.png" title="Lists"></a></td>

						<td id="gdItem16"><a tabindex="1" onclick="urlRedirect('./mappacks')"><img class="menubutton menu-mappacks" src="assets/category-packs.png" title="Map Packs"></a></td>
						
						
						<td><a tabindex="1" onclick="urlRedirect('./search')"><img class="menubutton menu-search" src="assets/category-search.png" title="Search"></a></td>
					</tr>
					
					<tr class="menuButtonList">

					<td class="notfinishedBtn"><a tabindex="0" onclick="urlRedirect('./requests')"><img class="menubutton menu-request" src="assets/category-levelreq.png" title="Level Request"></a></td>

					<td class="checkperm-gauntlets"><a tabindex="1" onclick="urlRedirect('./moderation')"><img class="menubutton menu-moderator" src="assets/category-moderator.png" title="Moderators"></a></td>
					
					</tr>
			</table>


			
	</div>

	<!-- <div style="position:absolute; bottom: 17%; right: 7%; width: 9%; text-align: right; pointer-events: none">
		<img src="assets/privateservers.png" width=85%;">
	</div>

	<div style="position:absolute; bottom: 2.5%; right: 1.5%; text-align: right; width: 18%;">
		<a href="../gdps" title="GD Private Servers"><img class="gdButton" src="assets/basement.png" width="40%"></a>
	</div>

	 -->

	
	<p style="color: #ffffff1f; font-size: 2.5vh; position: absolute; top: 95%; left: 50%; transform: translate(-50%, -50%); text-align: center;">ObeyGDBrowser 1.1 Alpha Version.<br><span id="randomStuffText"></span></p>

	<div class="center" width="100%" style="margin-top: 1%">
    	<img src="<?php echo isset($gdps_settings["gdps_logo_url"]) ? $gdps_settings["gdps_logo_url"] : 'assets/gdlogo.png'; ?>" height="11.5%"><br>
    	<img id="browserlogo" src="<?php echo isset($gdps_settings["gdps_level_browser_logo_url"]) ? $gdps_settings["gdps_level_browser_logo_url"] : 'assets/browser.png'; ?>" height="7%" style="margin: 0.5% 0% 0% 30%">
	</div>

	<div id="noDaily" style="display: none;">
		<div class="copied center noClick" style="position:absolute; top: 29%; left: 50%; transform: translate(-50%,-50%); width: 90vh; background-color: rgba(0, 0, 0, 0.7);">
			<h1 class="smaller noSelect">No active <span id="noLevel">daily</span> level!</h1>
		</div>
	</div>

</div>

</body>

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script type="text/javascript" src="./misc/global.js"></script>
<script type="text/javascript" src="./misc/updater.js"></script>
<script type="text/javascript" src="./misc/gdcustomframe.js"></script>

<script>
let userNameUser = "<?php echo $userName; ?>"
let isLoggedUser = "<?php echo $logged; ?>"
let accountID = "<?php echo $accountID ?>" ;

function openProfle() {
	
	if(isLoggedUser == "1") {
		openGdCustomFrame("./profile/?u="+accountID+"&gdframe");
	} else {
		openGdCustomFrame('./account/checkLogin.php');
	}
}

function openSpecialLvl(id) {
	openGdCustomFrame(`./level/?id=${id}`);
}


// NATIVE
function darknessPage(){
	const overlay = document.createElement('div');
    overlay.id = 'overlay';
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.backgroundColor = 'black';
    overlay.style.opacity = '0';
    overlay.style.transition = 'opacity 0.3s ease-in-out';
    overlay.style.pointerEvents = 'none';
    document.body.appendChild(overlay);
	setTimeout(function () {
    	overlay.style.opacity = '1';
	}, 100);  
}

</script>

<script>

let gdpsVersion = <?php echo $gdpsVersion; ?>;
let legacyServer = true;
let isAdmin = false;

<?php if ($logged && $isAdmin) {

	echo "isAdmin = true;";

} ?>



if (isAdmin) {
        setTimeout(function () {
            const event = new Event('initLoadingAlert');
            document.dispatchEvent(event);
            changeLoadingAlert(`Checking updates...`);
            checkCoreBrowser();
        }, 700);
}

if (typeof globalMismatch === 'undefined' || globalMismatch != "4") {
    console.warn("OGDBROWSER: Version and asset discrepancy, this may cause errors when viewing new features or completely broken functionalities. Clear your browser cache for this site and refresh, or wait for your web host to sync the assets. If you're a GDPSFH user, changes may take up to 1 hour to appear.");
	setTimeout(function () {
		$("#alertMismathAssets").show()
	}, 500);
}

function viewAdvMismatchAlert(obj) {
	$(`#${obj}`).hide();
	CreateFLAlert("Discrepancy!","# This may cause errors in new features or completely broken functionalities.\n`a0 Clear your browser cache for this site and refresh, or wait for your web host to sync the assets.`\n\n\n\n## If you're a GDPSFH user, changes may take up to 1 hour to appear.")
}


function getAbsoluteUrl(relativeUrl) {
	if (relativeUrl.startsWith('http://') || relativeUrl.startsWith('https://')) {
        return relativeUrl;
    }
   	// const baseUrl = window.location.origin; 
    return new URL(relativeUrl, window.location.href).href; 
}


function urlRedirect(url_browser) {
	const event = new Event('initLoadingAlert');
    document.dispatchEvent(event);

	url_browser = getAbsoluteUrl(url_browser)
	
	if (window.location.protocol === 'https:') { 
		url_browser = url_browser.replace('http:', 'https:')
	}


	fetch(url_browser, { method: 'HEAD' })
    .then(response => {
    	if (response.ok) {
			darknessPage();
			const event = new Event('finishLoadingAlert');
			document.dispatchEvent(event);
			setTimeout(function () {
            	window.location.href = url_browser;
			}, 500);
        } else {
			changeLoadingAlert(`Browser error code: ${response.status}`)
			setTimeout(function () {
				const event = new Event('finishLoadingAlert');
				document.dispatchEvent(event);
			}, 500);
        }
    })
    .catch(error => {
		if (window.location.protocol === 'https:' && error == "TypeError: Failed to fetch") { //FALSE HTTPS 
			changeLoadingAlert(`Warning: Redirecting with HTTP due Web host errors`);
			darknessPage();
			setTimeout(function () {
					const event = new Event('finishLoadingAlert');
					document.dispatchEvent(event);
					setTimeout(function () {
						url_browser = url_browser.replace('https:', 'http:')
						window.location.href = url_browser;
					}, 500);
			}, 500);
		} else {
			changeLoadingAlert(`Browser fatal error`);
			setTimeout(function () {
					const event = new Event('finishLoadingAlert');
					document.dispatchEvent(event);
					CreateFLAlert("Fatal error in browser!","**Join our support server and report:** [![Geometry Dash](https://invidget.switchblade.xyz/EbYKSHh95B)](https://discord.gg/EbYKSHh95B) \n\n Log Error: `"+error+"`");
			}, 500);
		}
    });
}

function profileRedirect(url_browser) {
	var queryProfile = "";
    if (legacyServer == true) {
		queryProfile = "../../profile/?u=" + (encodeURIComponent(url_browser).replace(/%2F/gi, "") || "");
	} else {
		queryProfile = "../../profile/" + (encodeURIComponent(url_browser).replace(/%2F/gi, "") || "") 
	}
    if (queryProfile) urlRedirect("./u/" + queryProfile);
}

function levelRedirect(url_browser,type) {
	var queryLvl = "";


    if (legacyServer == true) {
		queryLvl = "/level/?id=" + (encodeURIComponent(url_browser) || "0")
	} else {
		queryLvl = "/level/" + (encodeURIComponent(url_browser) || "0")
	}

	console.log(queryLvl);

    if (queryLvl) urlRedirect("." + queryLvl);
}

function searchRedirect(url_browser,type) {
	var queryLvl = "";

	if (legacyServer == true) {
		queryLvl = "/search/search.php?s=" + (encodeURIComponent(url_browser) || "0")
		if (type != null) queryLvl = queryLvl + "&filter=" + type
	} else {
		queryLvl = "/search/" + (encodeURIComponent(url_browser) || "0")
		if (type != null) queryLvl = queryLvl + "?filter=" + type
	}

	console.log(queryLvl);

	if (queryLvl) urlRedirect("." + queryLvl);
}


	$("#loading-main").hide();
	function updateCoreWebButton(){
		$("#loading-main").show();
		const event = new Event('initLoadingAlert');
		document.dispatchEvent(event);
		changeLoadingAlert("Opening updater...");
		window.location.href = "./update";
	}

	function openGDPSSettings(){
		$("#loading-main").show();
		const event = new Event('initLoadingAlert');
		document.dispatchEvent(event);
		changeLoadingAlert("Opening settings...");
		window.location.href = "./gdpsettings";
	}

	

	function checkCoreBrowser() {
		let branch = localStorage.getItem('branchSelected') || 0;
		if(branch == 0) branch = "latest"
		else if(branch == 1) branch = "prerelease";
		else if(branch == 2) branch = "master"
		else branch = "latest"
		fetchGithubVersion('migmatos', 'ObeyGDBrowser', branch, './update/version.txt')
		.then(result => {
			const event = new Event('finishLoadingAlert');
			document.dispatchEvent(event);
			if (result.data) {
				let element = document.getElementById("updateText");
				let imgElement = document.getElementById("updateButtonImg");
				if (result.currentVersion != result.data.tag_name) {
					imgElement.style.filter = "hue-rotate(320deg)";
					imgElement.style.mixBlendMode = "unset";
					imgElement.classList.add("spin");
					element.innerHTML = "<cg><b>NEW UPDATE AVAILABLE!</b></cg>";
				} else {
					imgElement.style.filter = "unset";
					imgElement.style.mixBlendMode = "";
					imgElement.classList.remove("spin");
					element.innerHTML = "OGDBW Updater";
				}
			}
		});

	}

	function showCredits() {
		$creditsDesc = "# `g0 ** Developers ** ` \n- **MigMatos:** Developer of ObeyGDBrowser \n- **GD Colon:** Original developer of GDBrowser \n\n# `g0 ** Special Thanks ** ` \n- **RobTop:** Developer for Geometry Dash!\n- **OsitaLolita:** Ideas and feedback! <3 \n\n# `g0 ** Dev Helpers **` \n- **gdNoxi**: _Small code in get Gauntlets API_. \n- **YeahhColix**: _Gauntlet colors! Thx!_. \n\n# `a0 ** DONATORS **` \n- MidairGD \n\n# `g0 ** Bug Finders ** ` \n- Unix \n- NitroRMX \n- Karmagmr0\n- LostShadowGD\n- uproxide\n- M366\n- YeahhColix \n- Janix \n- alikenorbika123 \n\n **Join our support server** [![Geometry Dash](https://invidget.switchblade.xyz/EbYKSHh95B)](https://discord.gg/EbYKSHh95B)"
		CreateFLAlert("Credits!",$creditsDesc);
	}

	/* Legacy code for 0.27.1 */

	let alertValue = (new URLSearchParams(window.location.search)).get("alert");
	if (alertValue == "installed"){
		let newURLpush = window.location.href.replace(new RegExp(`(\\?alert=${alertValue})`), '');
		window.history.pushState(null, null, newURLpush);
		CreateFLAlert("ObeyGDBrowser 1.0","# Update installed successfully! \n## Explore ObeyGDBrowser!\nWe recommend accessing GDPS Settings to update your GDPS configurations (just click in the button `save` and done!).\n\n\n# [Open GDPS Settings!](./gdpsettings/)")
	}

</script>


<script>

let page = 1
<?php if (isset($gdps_settings["disable_colored_texture_level_browser"]) && $gdps_settings["disable_colored_texture_level_browser"] == 1): ?>
    $('#browserlogo').css('filter', `hue-rotate(${Math.floor(Math.random() * (330 - 60)) + 60}deg) saturate(${Math.floor(Math.random() * (150 - 100)) + 100}%)`);
<?php endif; ?>
let xButtonPos = '43%'
let lastPage

let dailyType = window.location.search.match(/\?daily=(\d)/);
if (dailyType) {
    let typeText = dailyType[1] == "2" ? "weekly" : dailyType[1] == "3" ? "event" : "daily";
    $('#noLevel').html(typeText);
    $('#noDaily').fadeIn(200).delay(700).fadeOut(500);
    window.history.pushState(null, null, window.location.href.replace(/\?daily=\d/g, ''));
}





</script>
<script>
    const facts = [
        "MigMatos is here!",
        "ProTip: Jump.",
        "Omax",
        "What Happens Here ?!?",
        "If you see this, you need to play Bloodbath'",
        "It took me too long to think of what to put here.",
        "Humans share 60% of their DNA with bananas.",
        "RobTop releases 2.4! 🗣🗣🗣",
        "Explorers never existed, it was a government invention",
        "B",
		"Link your Discord with ObeyGDBrowser!!!",
		"Complete daily in one attempt",
		"Obey"
    ];
    document.getElementById("randomStuffText").innerText = facts[Math.floor(Math.random() * facts.length)];
</script>
<script type="text/javascript" src="./misc/versionadapter.js"></script>

<script>
var deferredPrompt;

window.addEventListener('beforeinstallprompt', function (e) {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  if (isMobileDevice() && shouldShowInstallButton()) showAddToHomeScreen();
});

function shouldShowInstallButton() {
    return localStorage.getItem('showInstallerbutton') == null;
}

function isMobileDevice() {
    return /Mobi|Android|iPhone|iPad|iPod/.test(navigator.userAgent);
}

function showpopupPWA() {
	$('#installOGDWApp').show();
}

function closeWindow(obj) {
	$(`#${obj}`).hide();
	var a2hsBtn = document.querySelector(".ad2hs-prompt");
  	a2hsBtn.style.display = "none";
}

function hidePWAInstaller(obj) {
	var a2hsBtn = document.querySelector(".ad2hs-prompt");
  	a2hsBtn.style.display = "none";
	localStorage.setItem('showInstallerbutton', '0');
	$(`#${obj}`).hide();
}

function installPWABrowser(obj) {
	var a2hsBtn = document.querySelector(".ad2hs-prompt");
	console.log("Requesting PWA installer...")
    a2hsBtn.style.display = 'none';
	try{ deferredPrompt.prompt(); }
	catch(e) {
		CreateFLAlert("Installation Error", "This browser or mobile device may not support this feature.");
		$(`#${obj}`).hide();
		return;
	}
	deferredPrompt.userChoice.then((choiceResult) => {
		if (choiceResult.outcome === 'accepted') {
			CreateFLAlert("Installed!", "The app was successfully installed on your mobile phone!");
			$(`#${obj}`).hide();
		} else {
			CreateFLAlert("Installation Error", "This browser or mobile device may not support this feature.");
			$(`#${obj}`).hide();
		}
		deferredPrompt = null;
	});
}

function showAddToHomeScreen() {
  var a2hsBtn = document.querySelector(".ad2hs-prompt");
  a2hsBtn.style.display = "block";
  a2hsBtn.addEventListener('click', () => {
		showpopupPWA();
	});
}
</script>
<script>let userPermissions = <?php echo $userPermissionsJSON; ?>;</script>
<script type="text/javascript" src="./misc/checkperms.js"></script>
