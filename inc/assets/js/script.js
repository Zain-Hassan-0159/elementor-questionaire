

var options = document.querySelectorAll("#questionaire .ques-box .slides .slide .options .option");
options.forEach(op=>{
    op.addEventListener("click", function(){
        let attribute = op.getAttribute("data-option");
        let nextSlide = document.querySelector("#questionaire .ques-box .slides .slide"+attribute);
        op.parentElement.parentElement.classList.add("fade-out");
        setTimeout(function(){
          op.parentElement.parentElement.classList.add("d-none");
          if(nextSlide){
            nextSlide.classList.remove("d-none");
            nextSlide.classList.add("fade-in");
          }else{
            document.querySelector("#questionaire .ques-box .results").classList.remove("d-none");
            document.querySelector("#myProgress").classList.remove("d-none");
            document.querySelector("#questionaire #loading1").classList.add("fade-in");
            setTimeout(function(){
              document.querySelector("#questionaire #loading1").classList.add("fade-out");
              setTimeout(function(){
                document.querySelector("#questionaire #loading1").classList.add("d-none");
                document.querySelector("#questionaire #loading2").classList.remove("d-none");
                document.querySelector("#questionaire #loading2").classList.add("fade-in");

                setTimeout(function(){
                  document.querySelector("#questionaire #loading2").classList.add("fade-out");

                  setTimeout(function(){
                    document.querySelector("#questionaire #loading2").classList.add("d-none");
                    document.querySelector("#questionaire #loading3").classList.remove("d-none");
                    document.querySelector("#questionaire #loading3").classList.add("fade-in");
                  }, 700);

                }, 700);
                
              }, 700)
              move();


            }, 500);
          }

        }, 500)
    })
})

var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 30);
    function frame(){
      if (width >= 100) {
        clearInterval(id);
        i = 0;
        //document.querySelector("#myProgress").classList.add("d-none");
        document.querySelector("#questionaire .ques-box .results .loading").classList.add("d-none");
        document.querySelector("#questionaire .ques-box .results .afterLoading").classList.remove("d-none");
        document.querySelector("#questionaire .ques-box .results .afterLoading").classList.add("fade-in");
        
        countdown();
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}

var interval;
function countdown() {
    clearInterval(interval);
    interval = setInterval(function () {
        var timer = jQuery('#countingItem').html();
        timer = timer.split(':');
        var minutes = timer[0];
        var seconds = timer[1];
        seconds -= 1;
        if (minutes < 0) return;
        else if (seconds < 0 && minutes != 0) {
            minutes -= 1;
            seconds = 59;
        } else if (seconds < 10 && length.seconds != 2) seconds = '0' + seconds;
        else if (minutes < 1) minutes = '00';

        jQuery('#countingItem').html(minutes + ':' + seconds);

        if (minutes == 0 && seconds == 0) clearInterval(interval);
    }, 1000);
}