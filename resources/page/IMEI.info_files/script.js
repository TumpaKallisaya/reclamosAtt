

var bannerWidth = 468;
var bannerHeight = 60;

var loopNumber = 3;
var loopCount = 1; // Do not edit






// Additional Animations - Loop 1
function loop_1_Animations() {

}


// Additional Animations - Loop 2
function loop_2_Animations() {

}










// -------------------- Do not edit -------------------- //

function loop_1() {
    loopCount++;

    var content = document.getElementById("content");
    var loop = content.innerHTML;
    content.innerHTML = loop;

    var whiteout = document.getElementById("whiteout");
    
    if (loopCount == loopNumber) {
        whiteout.addEventListener("animationend", loop_2); 
    } else {
        whiteout.addEventListener("animationend", loop_1);   
    }
    
    loop_1_Animations();
}
    
function loop_2() {
    var content = document.getElementById("content");
    var loop = content.innerHTML;
    content.innerHTML = loop;
    
    var whiteout = document.getElementById("whiteout");
    whiteout.style.animationName = undefined;
    whiteout.style.animationName = "whiteout_animation_end";
    
    loop_2_Animations();
}

function contentPosition() {
    var contentPosition = document.querySelectorAll(".content_position");
    
    for (var i=0; i < contentPosition.length; i++) {
        contentPosition[i].style.width = bannerWidth+"px";
        contentPosition[i].style.height = bannerHeight+"px";
    }
    
    var border = document.getElementById("border");
    border.style.width = bannerWidth - 2+"px";
    border.style.height = bannerHeight - 2+"px";
}

function animationsPause() {
    var animations = document.querySelectorAll(".animation_duration");

    for (var i=0; i < animations.length; i++) {
        animations[i].style.animationPlayState = "paused";
    }
}

function animationsPlay() {
    var animations = document.querySelectorAll(".animation_duration");

    for (var i=0; i < animations.length; i++) {
        animations[i].style.animationPlayState = "running";
    }
}

function mouseEnter() {
//    animationsPause();
}
        
function mouseLeave() {

}





function stLoad() {
    console.log("ready-Standalone");
    init();
}

function dcLoad() {
    if (Enabler.isInitialized()) {
        enablerInitHandler();
    } else {
        Enabler.addEventListener(studio.events.StudioEvent.INIT, enablerInitHandler);
    }
}

function enablerInitHandler() {
    console.log("ready-DoubleClick");
    
    if (politeLoad) {
        if (Enabler.isPageLoaded()) {
            pageLoadedHandler();
        } else {
            Enabler.addEventListener(studio.events.StudioEvent.PAGE_LOADED, pageLoadedHandler);
        }
    } else {
        var extCSS = document.createElement("link");
        extCSS.setAttribute("rel", "stylesheet");
        extCSS.setAttribute("type", "text/css");
        extCSS.setAttribute("href", Enabler.getUrl("style.css"));
        document.getElementsByTagName("head")[0].appendChild(extCSS); 
        
        init();
    }
}
    
function pageLoadedHandler() {
    console.log("ready-polite");

    var extCSS = document.createElement("link");
    extCSS.setAttribute("rel", "stylesheet");
    extCSS.setAttribute("type", "text/css");
    extCSS.setAttribute("href", Enabler.getUrl("style.css"));
    document.getElementsByTagName("head")[0].appendChild(extCSS);
    
    preLoadImagesPolite();
}
    
function clicktag_Click(e) {
    if (dcSelect) {
        Enabler.exit("Exit Click");
        Enabler.counter("Counter Click");
    } else {
        window.open(window.clickTag);
    }
}

function preLoadImages() {
    var newImages = [];

    for (var i=0; i < images.length; i++) {
        newImages[i] = new Image();
        newImages[i].src = images[i]; 
    }
}

function preLoadImagesPolite() {
    var newImages = [];
    var loadedImages = [];

    for (var i=0; i < images.length; i++) {
        newImages[i] = new Image();
        newImages[i].src = images[i];
        
        newImages[i].onload = function() {
            loadedImages.push(i);
        }
    }  
    
    var bannerInit = setInterval(function() {
        if (loadedImages.length == images.length) {
            clearInterval(bannerInit);
            init();
        }
    }, 100);
}





function init() {
    content.innerHTML = data;
    
    if (loopNumber == 1) {
        loop_2();
    } else {
        loop_1();
    }

    contentPosition();
}





window.onload = function() {
    if (dcSelect) {
        dcLoad();
    } else {
        stLoad();
    }
}